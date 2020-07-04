<?php


// $link = mysqli_connect("loclahost", "root", "");

// // Checks connection
// if ($link === false){
//     die("ERROR: Could not connect. " . mysqli_connect_error());
// }

// // Creaating a Database
// $sql = "CREATE DATABASE bankingDB";
// if (mysqli_query($link, $sql)){
//     echo "Database created successfully";
// } else{
//     echo "ERROR: Could not execute $sql. " . mysqli_error($link);
// }

// Prints host name
// echo "Connected Successfully. Host info: " . mysqli_get_host_info($link);

$sql_host="localhost";
$sql_username="root";
$sql_password='';
$sql_database="bankingDb";

function connect_db() {
    global $sql_host, $sql_username, $sql_password, $sql_database;
    $conn = new mysqli($sql_host,$sql_username,$sql_password); // Connects to the database

    if(mysqli_connect_error($conn) !== null) {
        return false;
    }

    $conn -> select_db($sql_database);
    return $conn;
}




?>