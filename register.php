<?php
require './includes/dbconfig.php';

$username = 'tourist_admin';
$password = 'DCwjaTMUaSSi';

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");

if (!$stmt) {
    die("Prepare failed: " . $mysqli->error);
}

$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    echo "User added successfully!";
} else {
    if ($mysqli->errno == 1062) { // 1062 is the error code for duplicate entry
        echo "Error: Username already exists.";
    } else {
        echo "Error adding user: " . $stmt->error;
    }
}

$stmt->close();


?>