<?php
function mysql_query_to_mysqli_query($query, $connection){
    return mysqli_query($connection, $query);
}

function teste_count($var){
    return is_array($var)?count($var):0;
}