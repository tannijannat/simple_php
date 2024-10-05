<?php
$servername = "localhost";
$username = "root"; // Adjust if your MySQL username is different
$password = ""; // Leave blank if no password is set
$dbname = "task_manager"; // Make sure this matches your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

