<?php
$host = "localhost";
$user = "root"; 
$password = "";
$database = "users_db";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
} else {
    echo "Warning: Database connected successfully.";
}
?>