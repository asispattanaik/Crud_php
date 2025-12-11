<?php
$servername = "localhost:3307";
$username = "root";
$password = ""; 
$dbname = "crud_operation";

$con = mysqli_connect($servername, $username, $password, $dbname);


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>

