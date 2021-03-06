<?php

/*
* ================================================================
* ================================================================
*
*                connect to the database from here
*
*       -----   dsn = data source name'
*       -----   username = username to the database
*       -----   password = password to the database
*       -----   options = these are the options for the PDO 
* ================================================================
* ================================================================
*/


$dsn = "mysql:host=localhost;dbname=shops;";
$username = "root";
$password = "";
// $option = array(
//     PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",

// );
$option = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8mb4');

try {
    $db_connect = new PDO($dsn, $username, $password, $option);
    $db_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "you are connected to the database";
} catch (PDOException $e) {
    echo "<div class='alter alert-danger py-3'><div class='container'><div class=''>failed to connect" .  $e->getMessage() . "</div></div></div>";
}