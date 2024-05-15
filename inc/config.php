<?php

session_start();

$server = "localhost";
$username = "root";
$password = "";
$database = "loginregister";

$conn = new mysqli($server, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

?>

