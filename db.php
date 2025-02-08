<?php
$host = "localhost";
$user = "root";  // Default in XAMPP
$pass = "";  // Default is empty in XAMPP
$dbname = "gbu";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}