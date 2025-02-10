<?php
session_start();
include('includes/dbconfig.php');

// Validate order ID from URL
if (!isset($_GET['order_id']) || empty($_GET['order_id'])) {
    die("Invalid request.");
}

$ticket_id = intval($_GET['order_id']);

// Update the ticket status in the database
$stmt = $mysqli->prepare("UPDATE tickets SET status = 'Payment Complete' WHERE id = ?");
$stmt->bind_param("i", $ticket_id);
$stmt->execute();

// Retrieve ticket details
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$total_adults = $_SESSION['total_adults'];
$total_children = $_SESSION['total_children'];
$total_amount = number_format($_SESSION['total_amount'], 2);
$booking_date = $_SESSION['booking_date'];

// Prepare email content
$subject = "Ticket Payment Confirmation";
$message = "Dear $name,\n\nThank you for your payment. Your total amount paid: $total_amount LKR.\nBooking Date: $booking_date\n\nBest regards,\nWestern Province Tourist Board";
$headers = "From: no-reply@touristboard.wp.gov.lk";

// Send email to the customer
mail($email, $subject, $message, $headers);

// Send email to the admin
$admin_email = "yohanii725@gmail.com";
$admin_subject = "New Ticket Payment Received";
$admin_message = "A new ticket payment has been completed.\n\nCustomer: $name\nEmail: $email\nTotal Adults: $total_adults\nTotal Children: $total_children\nTotal Amount: $total_amount LKR\nBooking Date: $booking_date\n\nPlease check the system for details.";
mail($admin_email, $admin_subject, $admin_message, $headers);

// Clear sensitive session data after payment
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">


  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="description" content="Discover the Western Province of Sri Lanka, a region rich in cultural heritage, natural beauty, and vibrant city life. Plan your adventure today!" />

  <link rel="icon" href="images/logo/logo_.png" alt="Tourist Board Logo" type="image/x-icon">

  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald:200,300,400,500,700%7CMontserrat:400,500,600">

  <link rel="stylesheet" href="css/bootstrap.css">

  <link rel="stylesheet" href="css/fonts.css">

  <link rel="stylesheet" href="css/style.css">

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=Protest+Revolution&family=Quintessential&display=swap" rel="stylesheet">

<title>Ticket Payment Complete</title>

    <style>
        body {
            background-color: #6c91ac;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            text-align: center;
        }

        h2 {
            color: #144c7c;
        }

        p {
            color: #1c748c;
            font-size: 18px;
            margin: 10px 0;
        }

        .hidden {
            display: none;
        }

        .btn {
            background-color: #34ac64;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin: 10px 5px;
        }

        .btn:hover {
            background-color: #1c748c;
        }

        .logo {
            width: 100px;
            margin-bottom: 20px;
        }
    </style>

</head>
<body>
    <div class="container">
        <img src="https://touristboard.wp.gov.lk/images/logo/logo_.png" alt="Tourist Board Logo" class="logo">
        <h2>Payment Successful</h2>
        <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
        <p><strong>Total Adults:</strong> <?= htmlspecialchars($total_adults) ?></p>
        <p><strong>Total Children:</strong> <?= htmlspecialchars($total_children) ?></p>
        <p><strong>Total Cost:</strong> <?= htmlspecialchars($total_amount) ?> LKR</p>
        <p><strong>Booking Date:</strong> <?= htmlspecialchars($booking_date) ?></p>
        <p class="hidden"><strong>Order ID:</strong> <?= htmlspecialchars($order_id) ?></p>
        <button class="btn" onclick="window.print()">Print Ticket</button>
        <a href="home.php" class="btn">Return to Home</a>
    </div>
</body>
</html>
