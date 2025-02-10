<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "touristweb");

// Check for connection errors
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Ensure $mysqli is globally accessible
return $mysqli;
?>
