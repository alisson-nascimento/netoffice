<?php // $Revision: 1.1.1.1 $
/* vim: set expandtab ts=4 sw=4 sts=4: */

/**
 * $Id: lang_da.php,v 1.1.1.1 2004/11/02 03:30:22 madbear Exp $
 * 
 * Copyright (c) 2003 by the NetOffice developers
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 */
// translator(s): Mark Petersen
$setCharset = "ISO-8859-1";

$byteUnits = array('Bytes', 'KB', 'MB', 'GB');

$dayNameArray = array(1 => "Monday", 2 => "Tuesday", 3 => "Wednesday", 4 => "Thursday", 5 => "Friday", 6 => "Saturday", 7 => "Sunday");

$monthNameArray = array(1 => "Januar", "Februar", "Marts", "April", "Maj", "Juni", "July", "August", "September", "October", "November", "December");

$status = array(0 => "Kunde udf�rt", 1 => "Udf�rt", 2 => "Ikke begyndt", 3 => "�bn", 4 => "Sat i bero");

$profil = array(0 => "Administrator", 1 => "Project Manager", 2 => "Bruger", 3 => "Kunde bruger", 4 => "Disabled", 5 => "Project Manager Administrator");

$priority = array(0 => "Ingen", 1 => "Meget lav", 2 => "Lav", 3 => "Medium", 4 => "H�j", 5 => "Meget h�j");

$statusTopic = array(0 => "Lukket", 1 => "�bn");
$statusTopicBis = array(0 => "Ja", 1 => "Nej");

$statusPublish = array(0 => "Ja", 1 => "Nej");

$statusFile = array(0 => "Godkendt", 1 => "Godkendt Med �ndringer", 2 => "Skal Godkendes", 3 => "Ingen Godkendelse N�dvendig", 4 => "Ikke Godkendt");

$phaseStatus = array(0 => "Not started", 1 => "Open", 2 => "Complete", 3 => "Suspended");

$requestStatus = array(0 => "New", 1 => "Open", 2 => "Complete");

$strings["please_login"] = "Log venligst ind";
$strings["requirements"] = "System krav";
$strings["login"] = "Log Ind";
$strings["no_items"] = "Ingen emner at vise";
$strings["logout"] = "Log Ud";
$strings["preferences"] = "Preferencer";
$strings["my_tasks"] = "Mine Opgaver";
$strings["edit_task"] = "Ret Opgave";
$strings["copy_task"] = "Kopier Opgave";
$strings["add_task"] = "Tilf�j Opgave";
$strings["delete_tasks"] = "Slet Opgave";
$strings["assignment_history"] = "Tildelings Historie";
$strings["assigned_on"] = "Tildelt d.";
$strings["assigned_by"] = "Tildelt af";
$strings["to"] = "Til";
$strings["comment"] = "Kommentar";
$strings["task_assigned"] = "Opgave tildelt ";
$strings["task_unassigned"] = "Opgave tildelt Ingen (Ikke tildelt)";
$strings["edit_multiple_tasks"] = "Ret Flere Opgaver";
$strings["tasks_selected"] = "opgave valgt. V�lg Nye v�rdier for disse opgaver, eller v�lg [Ingen �ndringer] for at beholde de nuv�rende v�rdier.";
$strings["assignment_comment"] = "Tildelingskommentar";
$strings["no_change"] = "Ingen �ndringer";
$strings["my_discussions"] = "Mine Debatindl�g";
$strings["discussions"] = "Debatindl�g";
$strings["delete_discussions"] = "Slet Debatindl�g";
$strings["delete_discussions_note"] = "Note: Debatindl�g kan ikke gen�bnes n�r f�rst de er slettet.";
$strings["topic"] = "Emne";
$strings["posts"] = "Indl�g";
$strings["latest_post"] = "Seneste Svar";
$strings["my_reports"] = "Mine Reporter";
$strings["reports"] = "Reporter";
$strings["create_report"] = "Tilf�j Report";
$strings["report_intro"] = "V�lg dine opgave rapporterings parametre her og gem forsp�rgelsen p� resultat siden efter du har k�rt din rapport.";
$strings["admin_intro"] = "Projekt indstillinger og konfiguration.";
$strings["copy_of"] = "Kopi af ";
$strings["add"] = "Tilf�j";
$strings["delete"] = "Slet";
$strings["remove"] = "Fjern";
$strings["copy"] = "Kopier";
$strings["view"] = "Vis";
$strings["edit"] = "Ret";
$strings["update"] = "Opdater";
$strings["details"] = "Detaljer";
$strings["none"] = "Ingen";
$strings["close"] = "Luk";
$strings["new"] = "Ny";
$strings["select_all"] = "V�lg Alle";
$strings["unassigned"] = "Ikke Tildelt";
$strings["administrator"] = "Administrator";
$strings["my_projects"] = "Mine Projekter";
$strings["project"] = "Projekt";
$strings["active"] = "Aktive";
$strings["inactive"] = "Ikke Aktive";
$strings["project_id"] = "Projekt ID";
$strings["edit_project"] = "Ret Projekt";
$strings["copy_project"] = "Kopier Projekt";
$strings["add_project"] = "Tilf�j Projekt";
$strings["clients"] = "Kunder";
$strings["organization"] = "Kundens Organisation";
$strings["client_projects"] = "Kundens Projekter";
$strings["client_users"] = "Kundens brugere";
$strings["edit_organization"] = "Ret Kunde Organisation";
$strings["add_organization"] = "Tilf�j Kunde Organisation";
$strings["organizations"] = "Kunde Organisationer";
$strings["info"] = "Info";
$strings["status"] = "Status";
$strings["owner"] = "Ejer";
$strings["home"] = "Forside";
$strings["projects"] = "Projekter";
$strings["files"] = "Filer";
$strings["search"] = "S�g";
$strings["admin"] = "Administrator";
$strings["user"] = "Bruger";
$strings["project_manager"] = "Projekt Manager";
$strings["due"] = "Forfalden";
$strings["task"] = "Opgave";
$strings["tasks"] = "Opgaver";
$strings["team"] = "Team";
$strings["add_team"] = "Tilf�j Team Medlemmer";
$strings["team_members"] = "Team Medlemmer";
$strings["full_name"] = "Navn";
$strings["title"] = "Titel";
$strings["user_name"] = "Bruger Navn";
$strings["work_phone"] = "Tlf. Arbejde";
$strings["priority"] = "Prioritet";
$strings["name"] = "Navn";
$strings["id"] = "ID";
$strings["description"] = "Beskrivelse";
$strings["phone"] = "Tlf.";
$strings["url"] = "URL";
$strings["address"] = "Adresse";
$strings["comments"] = "Kommentare";
$strings["created"] = "Oprettet";
$strings["assigned"] = "Tildelt";
$strings["modified"] = "�ndret";
$strings["assigned_to"] = "Tildelt til";
$strings["due_date"] = "Forfalden dato";
$strings["estimated_time"] = "Estimeret Tidsforbrug";
$strings["actual_time"] = "Faktisk Tidsforbrug";
$strings["delete_following"] = "Slet f�lgende?";
$strings["cancel"] = "Annuler";
$strings["and"] = "og";
$strings["administration"] = "Administration";
$strings["user_management"] = "Bruger Styring";
$strings["system_information"] = "System Information";
$strings["product_information"] = "Produkt Information";
$strings["system_properties"] = "System Egenskaber";
$strings["create"] = "Tilf�j";
$strings["report_save"] = "Gem denne Rapport p� din side s� du kan k�re forsp�rgslen igen.";
$strings["report_name"] = "Report Name";
$strings["save"] = "Gem";
$strings["matches"] = "Matcher";
$strings["match"] = "Match";
$strings["report_results"] = "Rapport Resultat";
$strings["success"] = "Lykkedes";
$strings["addition_succeeded"] = "Tilf�jelse Lykkedes";

$strings["deletion_succeeded"] = "Sletning Lykkedes";
$strings["report_created"] = "Tilf�jede Raport";
$strings["deleted_reports"] = "Sletede Raport";
$strings["modification_succeeded"] = "�ndring Lykkedes";
$strings["errors"] = "Fejl fundet!";
$strings["blank_user"] = "Brugeren blev ikke fundet.";
$strings["blank_organization"] = "Kundens organisation kan ikke findes.";
$strings["blank_project"] = "Projektet kan ikke findes.";
$strings["user_profile"] = "Bruger Profil";
$strings["change_password"] = "�ndre Password";
$strings["change_password_user"] = "�ndre brugerens password.";
$strings["old_password_error"] = "Det gamle password du indtastede er ikke korrekt. Pr�ve venligst at indtaste det gamle password igen.";
$strings["new_password_error"] = "Det andet password du indtastede passer ikke med det f�rste. Pr�v venligst at indtaste det nye password igen.";
$strings["notifications"] = "P�mindelser";
$strings["change_password_intro"] = "Indtast dit gamle password, indtast herefter det nye.";
$strings["old_password"] = "Gammelt Password";
$strings["password"] = "Password";
$strings["new_password"] = "Nyt Password";
$strings["confirm_password"] = "Bekr�ft Password";
$strings["email"] = "E-Mail";
$strings["home_phone"] = "Tlf. Hjemme";
$strings["mobile_phone"] = "Mobil tlf.";
$strings["fax"] = "Fax";
$strings["permissions"] = "Rettigheder";
$strings["administrator_permissions"] = "Administrator Rettigheder";
$strings["project_manager_permissions"] = "Projekt Manager Rettigheder";
$strings["user_permissions"] = "Bruger Rettigheder";
$strings["account_created"] = "Konto Oprettet";
$strings["edit_user"] = "Ret Bruger";
$strings["edit_user_details"] = "Ret Bruger konto detaljer.";
$strings["change_user_password"] = "�ndre brugerens password.";
$strings["select_permissions"] = "V�lg Rettigheder for denne bruger";
$strings["add_user"] = "Tilf�j Bruger";
$strings["enter_user_details"] = "Indtast detaljer for den brugerkonto du er ved at oprette.";
$strings["enter_password"] = "Indtast brugerens password.";
$strings["success_logout"] = "Du er logget af med succes. Du kan logge p� igen ved at indtaste dit brugernavn og password herunder.";
$strings["invalid_login"] = "Brugernavn og/eller password ikke korrekt. Fors�g venligst igen.";
$strings["profile"] = "Profil";
$strings["user_details"] = "Bruger konto detaljer.";
$strings["edit_user_account"] = "Ret dine konto informationer.";
$strings["no_permissions"] = "Du har ikke rettigheder til g�re dette.";
$strings["discussion"] = "Debat";
$strings["retired"] = "Tilbagetrukket";
$strings["last_post"] = "Sidste Indl�g";
$strings["post_reply"] = "Svar p� Indl�g";
$strings["posted_by"] = "Indl�g af";
$strings["when"] = "N�r";
$strings["post_to_discussion"] = "Indl�g til Debat";
$strings["message"] = "Meddelelse";
$strings["delete_reports"] = "Slet Rapporter";
$strings["delete_projects"] = "Slet Projekter";
$strings["delete_organizations"] = "Slet Kunde Organisationer";
$strings["delete_organizations_note"] = "Note: Dette vil slette alle kundens brugere for disse kunde organisation, og deassosiere alle �bne projekter fra disse kunders organisationer.";
$strings["delete_messages"] = "Slet Meddelelser";
$strings["attention"] = "Attention";
$strings["delete_teamownermix"] = "Fjernelse lykkedes, men projekt ejeren kan ikke fjernes fro projekt teamet.";
$strings["delete_teamowner"] = "Du kan ikke fjerne projekt ejeren fra projekt teamet..";
$strings["enter_keywords"] = "Indtast N�gleord";
$strings["search_options"] = "N�gleord og s�ge muligheder";
$strings["search_note"] = "Du skal indtaste informationer i S�g efter feltet.";
$strings["search_results"] = "S�ge Resultat";
$strings["users"] = "Brugere";
$strings["search_for"] = "S�g efter";
$strings["results_for_keywords"] = "S�geresultater for N�gleord";
$strings["add_discussion"] = "Tilf�j Debat";
$strings["delete_users"] = "Slet Bruger kontoer";
$strings["reassignment_user"] = "Projekt og Opgave Omfordeling";
$strings["there"] = "Der er";
$strings["owned_by"] = "Ejet af brugeren ovenfor.";
$strings["reassign_to"] = "F�r brugere slettes, omfordel disse til";
$strings["no_files"] = "Ingen Filer sammenk�det";
$strings["published"] = "Publiseret";
$strings["project_site"] = "Projekt Side";
$strings["approval_tracking"] = "Godkendelses Tracking";
$strings["size"] = "St�rrelse";
$strings["add_project_site"] = "F�j til Projekt Side";
$strings["remove_project_site"] = "Fjern fra Projekt Side";
$strings["more_search"] = "Flere s�ge muligheder";
$strings["results_with"] = "Find Resultater med";
$strings["search_topics"] = "S�g Emner";
$strings["search_properties"] = "S�g Egenskaber";
$strings["date_restrictions"] = "Dato Restrictions";
$strings["case_sensitive"] = "Forskel p� store og sm� bogstaver";
$strings["yes"] = "Ja";
$strings["no"] = "Nej";
$strings["sort_by"] = "Sorter efter";
$strings["type"] = "Type";
$strings["date"] = "Dato";
$strings["all_words"] = "alle ordene";
$strings["any_words"] = "hvilket som helst af ordene";
$strings["exact_match"] = "pr�cis match";
$strings["all_dates"] = "Alle datoer";
$strings["between_dates"] = "Mellem datoer";
$strings["all_content"] = "Alt indhold";
$strings["all_properties"] = "Alle egenskaber";
$strings["no_results_search"] = "S�gningen gav intet resultat.";
$strings["no_results_report"] = "Rapporten gav intet resultat.";
$strings["schema_date"] = "YYYY/MM/DD";
$strings["hours"] = "timer";
$strings["choice"] = "valg";
$strings["missing_file"] = "Fil mangler !";

$strings["project_site_deleted"] = "The project site was successfully deleted.";
$strings["add_user_project_site"] = "The user was successfully granted permission to access the Project Site.";
$strings["remove_user_project_site"] = "User permission was successfully removed.";
$strings["add_project_site_success"] = "The addition to the project site succeeded.";
$strings["remove_project_site_success"] = "The removal from the project site succeeded.";
$strings["add_file_success"] = "Linked 1 content item.";
$strings["delete_file_success"] = "Unlinking succeeded.";
$strings["update_comment_file"] = "The file comment was updated successfully.";
$strings["session_false"] = "Session error";
$strings["logs"] = "Logs";
$strings["logout_time"] = "Auto Log Out";
$strings["noti_foot1"] = "This notification was generated by PhpCollab.";
$strings["noti_foot2"] = "To view your PhpCollab Home Page, visit:";
$strings["noti_taskassignment1"] = "New task:";
$strings["noti_taskassignment2"] = "A task has been assigned to you:";
$strings["noti_moreinfo"] = "For more information, please visit:";
$strings["noti_prioritytaskchange1"] = "Task priority changed:";
$strings["noti_prioritytaskchange2"] = "The priority of the following task has changed:";
$strings["noti_statustaskchange1"] = "Task status changed:";
$strings["noti_statustaskchange2"] = "The status of the following task has changed:";
$strings["login_username"] = "You must enter a user name.";
$strings["login_password"] = "Please enter a password.";
$strings["login_clientuser"] = "This is a client user account. You cannot access PhpCollab with a client user account.";
$strings["user_already_exists"] = "There is already a user with this name. Please choose a variation of the user's name.";
$strings["noti_duedatetaskchange1"] = "Task due date changed:";
$strings["noti_duedatetaskchange2"] = "The due date of the following task has changed:";
$strings["company"] = "Company";
$strings["show_all"] = "Show All";
$strings["information"] = "Information";
$strings["delete_message"] = "Delete this message";
$strings["project_team"] = "Project Team";
$strings["document_list"] = "Document List";
$strings["bulletin_board"] = "Bulletin Board";
$strings["bulletin_board_topic"] = "Bulletin Board Topic";
$strings["create_topic"] = "Create a New Topic";
$strings["topic_form"] = "Topic Form";
$strings["enter_message"] = "Enter your message";
$strings["upload_file"] = "Upload a File";
$strings["upload_form"] = "Upload Form";
$strings["upload"] = "Upload";
$strings["document"] = "Document";
$strings["approval_comments"] = "Approval Comments";
$strings["client_tasks"] = "Client Tasks";
$strings["team_tasks"] = "Team Tasks";
$strings["team_member_details"] = "Project Team Member Details";
$strings["client_task_details"] = "Client Task Details";
$strings["team_task_details"] = "Team Task Details";
$strings["language"] = "Language";
$strings["welcome"] = "Welcome";
$strings["your_projectsite"] = "to Your Project Site";
$strings["contact_projectsite"] = "If you have any questions about the extranet or the information found here, please contact the project lead";
$strings["company_details"] = "Company Details";
$strings["database"] = "Backup and restore database";
$strings["company_info"] = "Edit your company informations";
$strings["create_projectsite"] = "Create Project Site";
$strings["projectsite_url"] = "Project Site URL";
$strings["design_template"] = "Design Template";
$strings["preview_design_template"] = "Preview Template Design";
$strings["delete_projectsite"] = "Delete Project Site";
$strings["add_file"] = "Add File";
$strings["linked_content"] = "Linked Content";
$strings["edit_file"] = "Edit file details";
$strings["permitted_client"] = "Permitted Client Users";
$strings["grant_client"] = "Grant Permission to View Project Site";
$strings["add_client_user"] = "Add Client User";
$strings["edit_client_user"] = "Edit Client User";
$strings["client_user"] = "Client User";
$strings["client_change_status"] = "Change your status below when you have completed this task";
$strings["project_status"] = "Project Status";
$strings["view_projectsite"] = "View Project Site";
$strings["enter_login"] = "Enter your login to receive new password";
$strings["send"] = "Send";
$strings["no_login"] = "Login not found in database";
$strings["email_pwd"] = "Password sent";
$strings["no_email"] = "User without email";
$strings["forgot_pwd"] = "Forgot password ?";
$strings["project_owner"] = "You can make changes only on your own projects.";
$strings["connected"] = "Connected";
$strings["session"] = "Session";
$strings["last_visit"] = "Last visit";
$strings["compteur"] = "Count";
$strings["ip"] = "Ip";
$strings["task_owner"] = "You are not a team member in this project";
$strings["export"] = "Export";
$strings["browse_cvs"] = "Browse CVS";
$strings["repository"] = "CVS Repository";
$strings["reassignment_clientuser"] = "Task Reassignment";
$strings["organization_already_exists"] = "That name is already in use in the system. Please choose another.";
$strings["blank_organization_field"] = "You must enter the client organization name.";
$strings["blank_fields"] = "mandatory fiels";
$strings["projectsite_login_fails"] = "We are unable to confirm the user name and password combination.";
$strings["start_date"] = "Start date";
$strings["completion"] = "Completion";
$strings["update_available"] = "An update is available!";
$strings["version_current"] = "You are currently using version";
$strings["version_latest"] = "The latest version is";
$strings["sourceforge_link"] = "See project page on Sourceforge";
$strings["demo_mode"] = "Demo mode. Action not allowed.";
$strings["setup_erase"] = "Erase the file setup.php!!";
$strings["no_file"] = "No file selected";
$strings["exceed_size"] = "Exceed max file size";
$strings["no_php"] = "Php file not allowed";
$strings["approval_date"] = "Approval date";
$strings["approver"] = "Approver";
$strings["error_database"] = "Can't connect to database";
$strings["error_server"] = "Can't connect to server";
$strings["version_control"] = "Version Control";
$strings["vc_status"] = "Status";
$strings["vc_last_in"] = "Date last modified";
$strings["ifa_comments"] = "Approval comments";
$strings["ifa_command"] = "Change approval status";
$strings["vc_version"] = "Version";
$strings["ifc_revisions"] = "Peer Reviews";
$strings["ifc_revision_of"] = "Review of version";
$strings["ifc_add_revision"] = "Add Peer Review";
$strings["ifc_update_file"] = "Update file";
$strings["ifc_last_date"] = "Date last modified";
$strings["ifc_version_history"] = "Version History";
$strings["ifc_delete_file"] = "Delete file and all child versions & reviews";
$strings["ifc_delete_version"] = "Delete Selected Version";
$strings["ifc_delete_review"] = "Delete Selected Review";
$strings["ifc_no_revisions"] = "There are currently no revisions of this document";
$strings["unlink_files"] = "Unlink Files";
$strings["remove_team"] = "Remove Team Members";
$strings["remove_team_info"] = "Remove these users from the project team?";
$strings["remove_team_client"] = "Remove Permission to View Project Site";
$strings["note"] = "Note";
$strings["notes"] = "Notes";
$strings["subject"] = "Subject";
$strings["delete_note"] = "Delete Notes Entries";
$strings["add_note"] = "Add Note Entry";
$strings["edit_note"] = "Edit Note Entry";
$strings["version_increm"] = "Select the version change to apply:";
$strings["url_dev"] = "Development site url";
$strings["url_prod"] = "Final site url";
$strings["note_owner"] = "You can make changes only on your own notes.";
$strings["alpha_only"] = "Alpha-numeric only in login";
$strings["edit_notifications"] = "Edit E-mail Notifications";
$strings["edit_notifications_info"] = "Select events for which you wish to receive E-mail notification.";
$strings["select_deselect"] = "Select/Deselect All";
$strings["noti_addprojectteam1"] = "Added to project team :";
$strings["noti_addprojectteam2"] = "You have been added to the project team for :";
$strings["noti_removeprojectteam1"] = "Removed from project team :";
$strings["noti_removeprojectteam2"] = "You have been removed from the project team for :";
$strings["noti_newpost1"] = "New post :";
$strings["noti_newpost2"] = "A post was added to the following discussion :";
$strings["edit_noti_taskassignment"] = "I am assigned to a new task.";
$strings["edit_noti_statustaskchange"] = "The status of one of my tasks changes.";
$strings["edit_noti_prioritytaskchange"] = "The priority of one of my tasks changes.";
$strings["edit_noti_duedatetaskchange"] = "The due date of one of my tasks changes.";
$strings["edit_noti_addprojectteam"] = "I am added to a project team.";
$strings["edit_noti_removeprojectteam"] = "I am removed from a project team.";
$strings["edit_noti_newpost"] = "A new post is made to a discussion.";
$strings["add_optional"] = "Add an optional";
$strings["assignment_comment_info"] = "Add comments about the assignment of this task";
$strings["my_notes"] = "My Notes";
$strings["edit_settings"] = "Edit settings";
$strings["max_upload"] = "Max file size";
$strings["project_folder_size"] = "Project folder size";
$strings["calendar"] = "Calendar";
$strings["date_start"] = "Start date";
$strings["date_end"] = "End date";
$strings["time_start"] = "Start time";
$strings["time_end"] = "End time";
$strings["calendar_reminder"] = "Reminder";
$strings["shortname"] = "Short name";
$strings["calendar_recurring"] = "Event recurs every week on this day";
$strings["edit_database"] = "Edit database";
$strings["noti_newtopic1"] = "New discussion :";
$strings["noti_newtopic2"] = "A new discussion was added to the following project :";
$strings["edit_noti_newtopic"] = "A new discussion topic was created.";
$strings["today"] = "Today";
$strings["previous"] = "Previous";
$strings["next"] = "Next";
$strings["help"] = "Help";
$strings["complete_date"] = "Complete date";
$strings["scope_creep"] = "Scope creep";
$strings["days"] = "Days";
$strings["logo"] = "Logo";
$strings["remember_password"] = "Remember Password";
$strings["client_add_task_note"] = "Note: The entered task is registered into the data base, appears here however only if it one assigned to a team member!";
$strings["noti_clientaddtask1"] = "Task added by client :";
$strings["noti_clientaddtask2"] = "A new task was added by client from project site to the following project :";
$strings["phase"] = "Phase";
$strings["phases"] = "Phases";
$strings["phase_id"] = "Phase ID";
$strings["current_phase"] = "Active phase(s)";
$strings["total_tasks"] = "Total Tasks";
$strings["uncomplete_tasks"] = "Uncompleted Tasks";
$strings["no_current_phase"] = "No phase is currently active";
$strings["true"] = "True";
$strings["false"] = "False";
$strings["enable_phases"] = "Enable Phases";
$strings["phase_enabled"] = "Phase Enabled";
$strings["order"] = "Order";
$strings["options"] = "Options";
$strings["support"] = "Support";
$strings["support_request"] = "Support Request";
$strings["support_requests"] = "Support Requests";
$strings["support_id"] = "Request ID";
$strings["my_support_request"] = "My Support Requests";
$strings["introduction"] = "Introduction";
$strings["submit"] = "Submit";
$strings["support_management"] = "Support Management";
$strings["date_open"] = "Date Opened";
$strings["date_close"] = "Date Closed";
$strings["add_support_request"] = "Add Support Request";
$strings["add_support_response"] = "Add Support Response";
$strings["respond"] = "Respond";
$strings["delete_support_request"] = "Support request deleted";
$strings["delete_request"] = "Delete support request";
$strings["delete_support_post"] = "Delete support post";
$strings["new_requests"] = "New requests";
$strings["open_requests"] = "Open requests";
$strings["closed_requests"] = "Complete requests";
$strings["manage_new_requests"] = "Manage new requests";
$strings["manage_open_requests"] = "Manage open requests";
$strings["manage_closed_requests"] = "Manage complete requests";
$strings["responses"] = "Responses";
$strings["edit_status"] = "Edit Status";
$strings["noti_support_request_new2"] = "You have submited a support request regarding: ";
$strings["noti_support_post2"] = "A new response has been added to your support request. Please review the details below.";
$strings["noti_support_status2"] = "Your support request has been updated. Please review the details below.";
$strings["noti_support_team_new2"] = "A new support request has been added to project: ";
// 2.0
$strings["delete_subtasks"] = "Delete subtasks";
$strings["add_subtask"] = "Add subtask";
$strings["edit_subtask"] = "Edit subtask";
$strings["subtask"] = "Subtask";
$strings["subtasks"] = "Subtasks";
$strings["show_details"] = "Show details";
$strings["updates_task"] = "Task update history";
$strings["updates_subtask"] = "Subtask update history";
// 2.1
$strings["go_projects_site"] = "Go to projects site";
$strings["bookmark"] = "Bookmark";
$strings["bookmarks"] = "Bookmarks";
$strings["bookmark_category"] = "Category";
$strings["bookmark_category_new"] = "New category";
$strings["bookmarks_all"] = "All";
$strings["bookmarks_my"] = "My Bookmarks";
$strings["my"] = "My";
$strings["bookmarks_private"] = "Private";
$strings["shared"] = "Shared";
$strings["private"] = "Private";
$strings["add_bookmark"] = "Add bookmark";
$strings["edit_bookmark"] = "Edit bookmark";
$strings["delete_bookmarks"] = "Delete bookmarks";
$strings["team_subtask_details"] = "Team Subtask Details";
$strings["client_subtask_details"] = "Client Subtask Details";
$strings["client_change_status_subtask"] = "Change your status below when you have completed this subtask";
$strings["disabled_permissions"] = "Disabled account";
$strings["user_timezone"] = "Timezone (GMT)";
// 2.2
$strings["project_manager_administrator_permissions"] = "Project Manager Administrator";
$strings["bug"] = "Bug Tracking";
// 2.3
$strings["report"] = "Report";
$strings["license"] = "License";
// 2.4
$strings["settings_notwritable"] = "Settings.php file is not writable";

?>
