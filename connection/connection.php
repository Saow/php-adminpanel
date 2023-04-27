<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

// Database connection
$servername = "sql202.byethost3.com";
$username = "b3_34089324";
$password = "pnGR^8Pw08@R";
$dbname = "b3_34089324_admin_panel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
