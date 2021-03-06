<?php // $Revision: 1.1.1.1 $
/* vim: set expandtab ts=4 sw=4 sts=4: */

/**
 * $Id: htpasswd.class.php,v 1.1.1.1 2004/11/02 03:30:12 madbear Exp $
 * 
 * Copyright (c) 2003 by the NetOffice developers
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 */

/*	**************************************************************

	Revision 0.9 1999/01/27 16:41:00 cdi@thewebmasters.net

	Public Methods:

		initialize	version
		sane		do_not_blame_cdi	cryptPass
		isUser		getPass				verifyUser
		changePass	addUser				genSalt
		deleteUser	getUserNum			assignPass
		renameUser

	Internal Methods:

		utime	htReadFile	htWriteFile
		error	genPass

*/

class Htpasswd {
    // Globally accessable variables
    var $VERSION = 'Revision 0.8 1999/01/17 15:20:00 cdi@thewebmasters.net'; 
    // var $UID		= getmyuid();
    // Set this to the user ID of the process
    // this program runs as. Used for sanity
    // checking. Defaults to same ID as
    // the file calling it.
    // UID deprecated 0.9 - it was used for some of the more anal
    // sane() routines - forgot to take it out in 0.7 when I should have
    var $WIN32 = false; // Set to true for M$ BloatWare servers
    
    var $FILE = ""; // Filename Holder
    var $ERROR = ""; // Last error message
    var $EMPTY = false; // Is the FILE empty?
    var $CONTENTS = ""; // Raw htpasswd contents
    var $EXISTS = false; // Boolean. True if $FILE exists
    var $SANE = false; // Boolean. True if $FILE passes all tests
    var $IDIOT = false; // Boolean. True if user is an idiot.
    var $DEBUG = false; // Boolean. Logs errors to error_log if set
    var $USERS = array(); // Array of [index#][(user|pass)]=value
    var $USERCOUNT = 0; // Counter - total number of users in $FILE 
    // Zero based indexing on $USERS
    // **************************************************************
    // An auto-constructor, can initilize the filename when
    // called from new()
    function Htpasswd ($passwdFile = "")
    {
        if (!empty($passwdFile)) {
            $this->initialize($passwdFile);
        } 
        return;
    } 
    // **************************************************************
    // The Initialize function sets up the FILE, checks it
    // for sanity, then loads it into the processes memory
    // htReadFile() should only be called using this method.
    function initialize ($passwdFile)
    {
        $this->FILE = $passwdFile;

        srand((double)microtime() * 1000000); // Seed the random number gen
        
        if (empty($passwdFile)) {
            // PHP is going to bitch about this, this is here just because
            $this->error("Invalid initialize() or new() method: No file specified!", 1);
            exit; // Just in case
        } 

        if (file_exists($this->FILE)) {
            $this->EXISTS = true;
            if ($this->sane($this->FILE)) {
                $this->SANE = true;
                $this->htReadFile();
            } else {
                // Preserve the error generated by sane()
                return;
            } 
        } else {
            $this->SANE = true; // Non-existant files are safe
        } 
        return;
    } 
    // **************************************************************
    // Turns off sanity checking. Needless to say if you do this
    // you're an idiot, but I'll give you the rope...
    function do_not_blame_cdi ()
    {
        $this->IDIOT = true;
        $this->error("No sanity checking on files", 0);
        return;
    } 
    // **************************************************************
    // Checks file sanity. Can be called publicly, giving the
    // full path to the file to be checked.
    // Can be disabled if you're an idiot by
    // calling $Htpasswd->do_not_blame_cdi()
    // Tons of junk removed Rev 0.7
    function sane ($filename)
    {
        if ($this->IDIOT) {
            return true;
        } 
        // If it's a Win32 box, there's no sense in doing all this
        if ($this->WIN32) {
            // You're on your own
            return true;
        } 
        // Some kind of *nix machine - let's do some
        // rudimentary checks
        if (!(is_readable($filename))) {
            $this->error("File [$filename] not readable", 0);
            return false;
        } 
        if (!(is_writeable($filename))) {
            $this->error("File [$filename] not writeable", 0);
            return false;
        } 
        if (is_dir($filename)) {
            $this->error("File [$filename] is a directory", 0);
            return false;
        } 
        if (is_link($filename)) {
            $this->error("File [$filename] is a symlink", 0);
            return false;
        } 
        // I had a lot of routines in here to do a lot of checking
        // on the file permissions and you know what? That
        // ain't my job. It's yours.
        // File is assumed to be sane - too bad I'm not.
        return true;
    } 
    // **************************************************************
    // Not really needed but it's a legacy thing...
    function version ()
    {
        return $this->VERSION;
    } 
    // **************************************************************
    // Error handling. Fatals immediately exit the program (very
    // few errors generate a fatal exit. Most just carp a warning
    // and continue. Logged via error_log method.
    function error ($errMsg, $die)
    {
        $this->ERROR = $errMsg; 
        // croak or carp?
        // If logging is turned off AND this is not
        // a Fatal error, just return
        if ((!($this->DEBUG)) && ($die != 1)) {
            return;
        } 

        if ($this->DEBUG) {
            error_log($this->ERROR, 0);
        } 

        if ($die == 1) {
            echo "<B> ERROR $this->ERROR </B> <BR> \n";
            exit;
        } 

        return;
    } 
    // **************************************************************
    // Internal function to read the FILE and process it's contents
    // Can be called publicly to re-read the file, but why would
    // you want to introduce another series of system calls like that?
    // This does the lions share of the work. This should only be
    // called once per process, and it should be called internally
    // by the initialize method. Have I mentioned that enough yet?
    function htReadFile ()
    {
        global $php_errormsg;

        $Mytemp = array();
        $Myjunk = array();
        $Junk = array();
        $count = 0;
        $user = "";
        $pass = "";
        $temp = "";
        $key = "";
        $val = "";
        $filesize = 0;
        $errno = 0;
        $empty = false;
        $contents = "";

        $filename = $this->FILE;
        $filesize = filesize($filename);

        if ($filesize < 3) {
            $empty = true;
        } 
        // Why did I pick 3? I dunno - seemed like the number
        // to use at the time.
        // (Actually, think [char]:[\n], the absolute smallest
        // size a "legitimate" password file can ever be.)
        if (!($empty)) {
            $this->EMPTY = false;

            $fd = fopen($filename, "r");

            if (empty($fd)) {
                $this->error("FATAL File access error [$php_errormsg]", 1);
                exit; // Just in case
            } 

            $contents = fread($fd, filesize($filename));
            fclose($fd);

            $this->CONTENTS = $contents;
            $Mytemp = split("\n", $contents);
            for($count = 0;$count < teste_count($Mytemp);$count++) {
                $user = "";
                $pass = "";

                if (empty($Mytemp[$count])) {
                    break;
                } 
                if (ereg("^(\n|\W)(.?)", $Mytemp[$count])) {
                    break;
                } 

                if (!(ereg(":", $Mytemp[$count]))) {
                    $user = $Mytemp[$count];
                    $errno = ($count + 1);
                    $this->error("FATAL invalid user [$user] on line [$errno] in [$filename]", 1);
                } 

                list ($user, $pass) = split(":", $Mytemp[$count]);

                if (($user != "") and ($pass != "")) {
                    $Myjunk[$count]["user"] = $user;
                    $Myjunk[$count]["pass"] = $pass;
                } 
            } 

            $this->USERS = $Myjunk;
            $this->USERCOUNT = $count;
        } else {
            // Empty file. Label it as such
            $this->USERS = $Myjunk;
            $this->USERCOUNT = -1;
            $this->EMPTY = true;
        } 

        return;
    } // end htReadFile()
    // **************************************************************
    // Given a plain text password and salt, returns crypt() encrypted
    // version. If salt is not passed or referenced, it will generate
    // a random salt automatically.
    function cryptPass ($passwd, $salt = "")
    {
        return $passwd;
    } // end cryptPass
    // **************************************************************
    // Returns true if UserID is found in the password file. False
    // otherwise.
    function isUser ($UserID)
    {
        $key = "";
        $val = "";
        $user = "";
        $pass = "";
        $found = false;

        if (empty($UserID)) {
            return false;
        } 
        if ($this->EMPTY) {
            return false;
        } 

        for($count = 0; $count <= $this->USERCOUNT; $count++) {
            if ($UserID == $this->USERS[$count]["user"]) {
                $found = true;
            } 
        } 

        return $found;
    } // end isUser
    // **************************************************************
    // Fetches the encrypted password from the password file and
    // returns it. Returns null on failure.
    function getPass ($UserID)
    {
        $key = "";
        $val = "";
        $user = "";
        $pass = "";
        $usernum = -1;

        if ($this->EMPTY) {
            return $pass;
        } 
        if (empty($UserID)) {
            return $pass;
        } 
        if (!($this->isUser($UserID))) {
            return $pass;
        } 

        $usernum = $this->getUserNum($UserID);
        if ($usernum == -1) {
            return false;
        } 

        $pass = $this->USERS[$usernum]["pass"];

        return $pass;
    } // end getPass
    // **************************************************************
    // Returns true if Users password matches the password in
    // the password file.
    
    // method deprecated 0.5 <cdi>
    // use verifyUser() instead
    
    function checkPass ($UserID, $Pass)
    {
        $retval = $this->verifyUser($UserID, $Pass);
        return $retval;
    } // end checkPass
    // **************************************************************
    // Returns true if Users password is authenticated, false otherwise
    
    // $Pass should be passed in un-encrypted
    function verifyUser ($UserID, $Pass)
    {
        $pass = "";
        $match = false;
        $usernum = -1;
        $salt = "";

        if ($this->EMPTY) {
            return false;
        } 
        if (empty($UserID)) {
            return false;
        } 
        if (empty($Pass)) {
            return false;
        } 
        if (!($this->isUser($UserID))) {
            return false;
        } 

        $usernum = $this->getUserNum($UserID);
        if ($usernum == -1) {
            return false;
        } 

        $pass = $this->USERS[$usernum]["pass"];
        $salt = substr($pass, 0, 2);
        $Pass = $this->cryptPass($Pass, $salt);

        if ($pass == $Pass) {
            $match = true;
        } 

        return $match;
    } // end verifyUser
    // **************************************************************
    // Changes an existing users password. If "oldPass" is null, or
    // if oldPass is not passed to this method, there is no checking
    // to be sure it matches their old password.
    
    // Needless to say, you shouldn't do dat, but I'll give you
    // the rope...
    
    // NewPass should be passed to this method un-encrypted.
    
    // Returns true on success, false on failure
    function changePass ($UserID, $newPass, $oldPass = "")
    { 
        // global $php_errormsg;
        $passwdFile = $this->FILE;
        $pass = "";
        $newname;
        $newpass; 
        // Can't very well change the password of a non-existant
        // user now can we?
        if ($this->EMPTY) {
            return false;
        } 
        if (empty($UserID)) {
            return false;
        } 

        if (!($this->isUser($UserID))) {
            // No sniffing for valid user IDs please
            $this->error("changePass failure for [$UserID]: Authentication Failure", 0);
            return false;
        } 

        if (empty($newPass)) {
            $this->error("changePass failure - no new password submitted", 0);
            return false;
        } 

        $newname = strtolower($UserID);
        $newpass = strtolower($newPass);

        if ($newname == $newpass) {
            $this->error("changePass failure: UserID and password cannot be the same", 0);
            return false;
        } 
        // If no old Password, don't force it to match
        // their existing password. NOT RECOMMENDED!
        // Be SURE to always send the oldPass!
        if (!(empty($oldPass))) {
            // Must validate the user now
            if (!($this->verifyUser($UserID, $oldPass))) {
                $this->error("changePass failure for [$UserID] : Authentication Failed", 0);
                return false;
            } 
            // OK - so the password is valid - are we planning
            // on actually changing it ?
            if ($newPass == $oldPass) {
                // Passwords are the same, no sense wasting time here
                return true;
            } 
        } 
        // Valid user with new password, OK to change.
        $usernum = $this->getUserNum($UserID);

        if ($usernum == -1) {
            return false;
        } 
        // No salt to cryptPass - generates a random one for us
        $this->USERS[$usernum]["pass"] = $this->cryptPass($newPass);

        if (!($this->htWriteFile())) {
            $this->error("FATAL could not save new password file! [$php_errormsg]", 1);
            exit; // just in case
        } 

        return true;
    } // end changePass
    // **************************************************************
    // A modified copy of changePass - changes the users name.
    // If $Pass is sent, it authenticates before allowing the change.
    // Returns true on success, false if;
    
    // The OldID is not found
    // The NewID already exists
    // The Password is sent and auth fails
    function renameUser ($OldID, $NewID, $Pass = "")
    {
        if ($this->EMPTY) {
            return false;
        } 
        if (empty($OldID)) {
            return false;
        } 
        if (empty($NewID)) {
            return false;
        } 

        if (!($this->isUser($OldID))) {
            // Send an auth failure - prevents people from fishing for
            // valid userIDs.
            // YOU will know its's because User is Unknown -
            // this error is slightly different than the real
            // authentication failure message. Compare the two.
            // Security through obscurity sucks but oh well..
            $this->error("renameUser failure for [$OldID]: Authentication Failure", 0);
            return false;
        } 
        if ($this->isUser($NewID)) {
            $this->error("Cannot change UserID, [$NewID] already exists", 0);
            return false;
        } 
        // If no Password, force a name change,
        // otherwise authenticate first.
        // Be SURE to always send the Pass!
        if (!(empty($Pass))) {
            // Must validate the user now
            if (!($this->verifyUser($OldID, $Pass))) {
                $this->error("renameUser failure for [$OldID] : Authentication Failed", 0);
                return false;
            } 
            // OK - so the password is valid - are we planning
            // on actually changing our name ?
            if ($NewID == $OldID) {
                // Nice new name ya got there Homer...
                return true;
            } 
        } 
        // Valid user, OK to change.
        $usernum = $this->getUserNum($OldID);

        if ($usernum == -1) {
            return false;
        } 

        $this->USERS[$usernum]["user"] = $NewID;

        if (!($this->htWriteFile())) {
            $this->error("FATAL could not save password file! [$php_errormsg]", 1);
            exit; // just in case
        } 

        return true;
    } // end renameUser
    // **************************************************************
    // Writes the new password file. Writes a temp file first,
    // then attempts to copy the temp file over the existing file
    // Original file not harmed if this fails.
    // Also kinda sorta gets around the lack of file locking in PHP
    // Hey, You there - PHP maintainer - FLOCK damn it! Not -everything-
    // in life is inside a friggen database.
    // On success, re-calls the initialize method to re-read
    // the new password file and returns true. False on failure
    function htWriteFile ()
    {
        global $php_errormsg;

        $filename = $this->FILE; 
        // On WIN32 box this should -still- work OK,
        // but it'll generate the tempfile in the system
        // temporary directory (usually c:\windows\temp)
        // YMMV
        $tempfile = tempnam("/tmp", "fort");

        $name = "";
        $pass = "";
        $count = 0;
        $fd;
        $myerror = "";

        if ($this->EMPTY) {
            $this->USERCOUNT = 0;
        } 

        if (!copy($filename, $tempfile)) {
            $this->error("FATAL cannot create backup file [$tempfile] [$php_errormsg]", 1);
            exit; // Just in case
        } 

        $fd = fopen($tempfile, "w");

        if (empty($fd)) {
            $myerror = $php_errormsg; // In case the unlink generates 
            // a new one - we don't care if
            // the unlink fails - we're
            // already screwed anyway
            unlink($tempfile);
            $this->error("FATAL File [$tempfile] access error [$myerror]", 1);
            exit; // Just in case
        } 

        for($count = 0; $count <= $this->USERCOUNT; $count++) {
            $name = $this->USERS[$count]["user"];
            $pass = $this->USERS[$count]["pass"];

            if (($name != "") && ($pass != "")) {
                fwrite($fd, "$name:$pass\n");
            } 
        } 

        fclose($fd);

        if (!copy($tempfile, $filename)) {
            $myerror = $php_errormsg; // Stash the error, see above
            unlink($tempfile);
            $this->error("FATAL cannot copy file [$filename] [$myerror]", 1);
            exit; // Just in case
        } 
        // Update successful
        unlink($tempfile);

        if (file_exists($tempfile)) {
            // Not fatal but it should be noted
            $this->error("Could not unlink [$tempfile] : [$php_errormsg]", 0);
        } 
        // Update the information in memory with the
        // new file contents.
        $this->initialize($filename);

        return true;
    } 
    // **************************************************************
    // Should be fairly obvious - adds a user to the htpasswd file
    // Returns true on success, false on failure
    function addUser ($UserID, $newPass)
    { 
        // global $php_errormsg;
        $count = $this->USERCOUNT;

        if (empty($UserID)) {
            $this->error("addUser fail. No UserID", 0);
            return false;
        } 
        if (empty($newPass)) {
            $this->error("addUser fail. No password", 0);
            return false;
        } 

        if ($this->isUser($UserID)) {
            $this->error("addUser fail. UserID already exists", 0);
            return false;
        } 

        if ($this->EMPTY) {
            $count = 0;
        } 

        $this->USERS[$count]["user"] = $UserID; 
        // No salt to cryptPass() - will generate a random one for us
        $this->USERS[$count]["pass"] = $this->cryptPass($newPass);

        if (!($this->htWriteFile())) {
            $this->error("FATAL could not add user due to file error! [$php_errormsg]", 1);
            exit; // Just in case
        } 
        // Successfully added user
        return true;
    } // end addUser
    // **************************************************************
    // Same as addUser, but adds the user to the password file
    // with a randomly generated password.
    
    // Returns plain text password on success, null on failure
    function assignPass ($UserID)
    {
        $pass = "";
        $count = $this->USERCOUNT;

        if (empty($UserID)) {
            $this->error("assignPass fail. No UserID", 0);
            return "";
        } 
        if ($this->EMPTY) {
            $count = 0;
        } 

        if ($this->isUser($UserID)) {
            $this->error("assignPass fail. UserID already exists. Use genPass instead", 0);
            return "";
        } 

        $pass = $this->genPass();

        $this->USERS[$count]["user"] = $UserID; 
        // No salt to cryptPass() - will generate a random one for us
        $this->USERS[$count]["pass"] = $this->cryptPass($pass);

        if (!($this->htWriteFile())) {
            $this->error("FATAL could not add user due to file error! [$php_errormsg]", 1);
            exit; // Just in case
        } 
        // Successfully added user
        return($pass);
    } // end assignPass
    // **************************************************************
    // Again, fairly obvious - deletes a user from the htpasswd file
    // Returns true on success, false on failure
    function deleteUser ($UserID)
    { 
        // global $php_errormsg;
        $found = false; 
        // Can't delete non-existant UserIDs
        if ($this->EMPTY) {
            return false;
        } 
        if (empty($UserID)) {
            // PHP should complain about this, but just in case
            $this->error("deleteUser fail. No UserID to delete.", 0);
            return false;
        } 
        if (!($this->isUser($UserID))) {
            $this->error("Cannot delete : [$UserID] not found.", 0);
            return false;
        } 

        $usernum = $this->getUserNum($UserID);

        if ($usernum == -1) {
            return false;
        } 

        $this->USERS[$usernum]["user"] = "";
        $this->USERS[$usernum]["pass"] = "";

        if (!($this->htWriteFile())) {
            $this->error("FATAL could not remove user due to file error! [$php_errormsg]", 1);
            exit; // Just in case
        } 
        // Successfully deleted user
        return true;
    } // end deleteUser
    // **************************************************************
    // Returns the user's UserID in the password file.
    // (Glorified line number)
    // Returns -1 if not found or errors
    function getUserNum ($UserID)
    {
        $count = 0;
        $usernum = -1;
        $name = "";

        if ($this->EMPTY) {
            return $usernum;
        } 
        if (empty($UserID)) {
            return $usernum;
        } 

        if (!($this->isUser($UserID))) {
            return $usernum;
        } 

        for($count = 0; $count <= $this->USERCOUNT; $count++) {
            $name = $this->USERS[$count]["user"];

            if ($name != "") {
                if ($name == $UserID) {
                    $usernum = $count;
                    break;
                } 
            } 
        } 

        return $usernum;
    } 
    // **************************************************************
    // Calculates current microtime
    function utime()
    {
        $time = explode(" ", microtime());
        $usec = (double)$time[0];
        $sec = (double)$time[1];
        return $sec + $usec;
    } 
    // **************************************************************
    // Generates a pseudo random 2 digit salt. Method will
    // generate different salts when called multiple times by
    // the same process.
    function genSalt ()
    {
        $random = 0;
        $rand64 = "";
        $salt = "";

        $random = rand(); // Seeded via initialize()
         
        // Crypt(3) can only handle A-Z a-z ./
        $rand64 = "./0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $salt = substr($rand64, $random % 64, 1) . substr($rand64, ($random / 64) % 64, 1);
        $salt = substr($salt, 0, 2); // Just in case
        
        return($salt);
    } 
    // **************************************************************
    // Generates a pseudo random 5 to 8 digit password. Method will even
    // generate different passwords when called multiple times by
    // the same process.
    function genPass ()
    {
        $random = 0;
        $rand78 = "";
        $randpass = "";
        $pass = "";

        $maxcount = rand(4, 9); 
        // The rand() limits (min 4, max 9) don't actually limit the number
        // returned by rand, so keep looping until we have a password that's
        // more than 4 characters and less than 9.
        if (($maxcount > 8) or ($maxcount < 5)) {
            do {
                $maxcount = rand(4, 9);
            } while (($maxcount > 8) or ($maxcount < 5));
        } 

        $rand78 = "./0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-=_+abcdefghijklmnopqrstuvwxyz";
        for($count = 0; $count <= $maxcount; $count++) {
            $random = rand(0, 77);
            $randpass = substr($rand78, $random, 1);
            $pass = $pass . $randpass;
        } 

        $pass = substr($pass, 0, 8); // Just in case
        
        return($pass);
    } // end genPass
    // **************************************************************
    // Generates a pseudo random 5 to 8 digit User ID. Method will
    // generate different User IDs when called multiple times by
    // the same process.
    function genUser ()
    {
        $random = 0;
        $rand78 = "";
        $randuser = "";
        $userid = "";

        $maxcount = rand(4, 9);

        if (($maxcount > 8) or ($maxcount < 5)) {
            do {
                $maxcount = rand(4, 9);
            } while (($maxcount > 8) or ($maxcount < 5));
        } 

        $rand62 = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        for($count = 0; $count <= $maxcount; $count++) {
            $random = rand(0, 61);
            $randuser = substr($rand62, $random, 1);
            $userid = $userid . $randuser;
        } 

        $userid = substr($userid, 0, 8); // Just in case
        
        return($userid);
    } // end genUser
    // **************************************************************
    // **************************************************************
} // END CLASS.HTPASSWD

?>
