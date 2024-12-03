<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eyacdb";

session_start();

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

