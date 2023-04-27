<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_panel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>