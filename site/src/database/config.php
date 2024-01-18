<?php 
    $db_name = "nerdclub";
    $db_user = "root";
    $db_pass = "";
    $db_server = "localhost";
    $conn = "";

    try{
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
        $connected = true;
    } catch(mysqli_sql_exception){
        $connected = false;
    }
?>