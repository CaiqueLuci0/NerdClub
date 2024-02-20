<?php 
    try{
        $conn = new PDO("mysql:dbname=nerdclub;host=localhost", "root", "");
        $connected = true;
    } catch(Exception $e){
        $connected = false;
        echo $e;
    }