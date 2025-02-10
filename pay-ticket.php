<?php
session_start(); // Start the session

include('includes/dbconfig.php');

// Clear previous session data to avoid duplicate payments
unset($_SESSION['ticket_order_id'], $_SESSION['email'], $_SESSION['name'], $_SESSION['booking_date'], $_SESSION['total_amount'], $_SESSION['total_adults'], $_SESSION['total_children']);

if (isset($_GET['ticket_id'])) {
    $ticket_id = intval($_GET['ticket_id']); 

    $stmt = $mysqli->prepare("SELECT * FROM tickets WHERE id = ?");
    $stmt->bind_param("i", $ticket_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $ticket = $result->fetch_assoc();

    if ($ticket) {
        // Assigning ticket_id and other details to session variables
        $_SESSION['ticket_order_id'] = $ticket_id;  
        $_SESSION['name'] = $ticket['name'];
        $_SESSION['email'] = $ticket['email'];
        $_SESSION['booking_date'] = $ticket['booking_date'];
        $_SESSION['total_amount'] = $ticket['total_amount'];
        $_SESSION['total_adults'] = $ticket['total_adults'];
        $_SESSION['total_children'] = $ticket['total_children'];

        // Assigning values to local variables for later use
        $name = $ticket['name'];
        $email = $ticket['email'];
        $booking_date = $ticket['booking_date'];
        $total_amount = $ticket['total_amount'];
        $total_adults = $ticket['total_adults'];
        $total_children = $ticket['total_children'];
    } else {
        echo "Ticket not found.";
        exit;
    }
} else {
    echo "Ticket ID is missing.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="images/logo/logo_.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald:200,300,400,500,700%7CMontserrat:400,500,600">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/fonts.css">
<link rel="stylesheet" href="css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=Protest+Revolution&family=Quintessential&display=swap" rel="stylesheet">
<title>Western Province Tourist Board</title>

<style>
    /* General Styles */
/* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

/* Centered Card Container */
.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 30px;
    background: #ffffff; /* White background */
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
    border-radius: 10px;
    text-align: center;
    border-top: 8px solid #144c7c; /* Accent border */
}

/* Header */
h2 {
    color: #4499e8;
    font-size: 28px;
    margin-bottom: 20px;
}

/* Ticket Price */
p:first-of-type {
    font-size: 22px;
    font-weight: bold;
    color: #34ac64;
}

/* Details Section */
.details {
    text-align: left;
    margin-top: 20px;
    padding: 20px;
    border: 1px solid #6c91ac;
    border-radius: 5px;
    background: #f9f9f9;
}

.details p {
    font-size: 18px;
    line-height: 1.6;
    color: #1c748c;
}

.details p strong {
    color: #4c7c9c;
}

/* Button Styling */
.btn {
    display: inline-block;
    width: 100%;
    padding: 15px;
    font-size: 18px;
    color: #fff;
    background: #144c7c;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease-in-out;
    margin-top: 20px;
    text-transform: uppercase;
}

.btn:hover {
    background: #1c748c;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        width: 90%;
        padding: 20px;
    }

    h2 {
        font-size: 24px;
    }

    .btn {
        font-size: 16px;
    }
}


</style>
</head>

<body>
    <div class="container">
        <h2>Pay for Your Tickets</h2>
        <p>Ticket Price: $40</p>

        <div class="details">
            <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
            <p><strong>Booking Date:</strong> <?= htmlspecialchars($booking_date) ?></p>
            <p><strong>Total Adults</strong> <?= htmlspecialchars($total_adults) ?></p>
            <p><strong>Total Children</strong> <?= htmlspecialchars($total_children) ?></p>
            <p><strong>Total Cost:</strong> <?= number_format($total_amount, 2) ?> LKR</p>
        </div>

        <!-- Payment Form -->
        <form action="process_ticket_payment.php" method="POST">
            <input type="hidden" name="ticket_id" value="<?= $_SESSION['ticket_order_id'] ?>">
            <button type="submit" class="btn">Pay Now</button>
        </form>
    </div>
</body>
</html>
