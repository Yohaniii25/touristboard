<?php
// submit_review.php
include 'includes/dbconfig.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $destination_id = $_POST['destination_id']; // Get the destination ID from the form
    $review = $_POST['review'];

    $query = "INSERT INTO reviews (name, email, dest_id, review) VALUES ('$name', '$email', '$destination_id', '$review')";
    mysqli_query($mysqli, $query); 

    header("Location: tours.php");
    exit();

}
