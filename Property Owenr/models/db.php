<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate_management_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
?>