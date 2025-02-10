<?php
// Start the session
session_start();

// Include the database configuration file
include('includes/dbconfig.php');

// If the form is submitted, process the booking
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve and sanitize form input
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $total_adults = (int)$_POST['total_adults'];
    $total_children = (int)$_POST['total_children'];
    $booking_date = $_POST['booking_date'];

    // Validate inputs
    if (empty($name) || empty($email) || $total_adults < 0 || $total_children < 0 || empty($booking_date)) {
        echo "All fields are required and must be valid.";
        exit;
    }

    // Ensure booking_date is in 'Y-m-d' format before insertion
    $booking_date = date('Y-m-d', strtotime($booking_date));

    // Fetch current daily dollar rate
    $result = $mysqli->query("SELECT rate FROM daily_dollar_rates WHERE date = CURDATE()");
    $row = $result->fetch_assoc();
    $current_rate = $row['rate'] ?? 0;

    // Define ticket prices
    $adult_ticket_price = 40; // USD
    $child_ticket_price = 40;  // USD

    // Calculate total amount in LKR
    $adult_full_amount = $total_adults * $adult_ticket_price;
    $child_full_amount = $total_children * $child_ticket_price;
    $total_amount = ($adult_full_amount + $child_full_amount) * $current_rate;

    // Insert booking data into the database
    $stmt = $mysqli->prepare("INSERT INTO tickets (name, email, total_adults, total_children, booking_date, total_amount) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiiss", $name, $email, $total_adults, $total_children, $booking_date, $total_amount);
    
    if ($stmt->execute()) {
        // Retrieve the ticket ID of the newly inserted record
        $ticket_id = $stmt->insert_id;

        // Save ticket details to session for later use
        $_SESSION['ticket_id'] = $ticket_id;

        // Redirect to the payment page with the ticket ID
        header("Location: pay-ticket.php?ticket_id=" . $ticket_id);
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!-- HTML Form for Ticket Booking -->
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
</head>

<style>
    /* General body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

/* Container for the form */
.form-container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

/* Header for the form */
h2 {
    text-align: center;
    color: #144c7c; /* Dark blue */
    margin-bottom: 20px;
}

/* Form elements */
form {
    display: flex;
    flex-direction: column;
}

/* Input fields */
input[type="text"],
input[type="email"],
input[type="number"],
input[type="date"] {
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="number"]:focus,
input[type="date"]:focus {
    border-color: #4499e8; /* Blue color when focused */
}

/* Submit button */
button[type="submit"] {
    padding: 10px;
    background-color: #34ac64; /* Green color */
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #2c628a; /* Darker blue for hover effect */
}

/* Label styles */
label {
    font-size: 14px;
    color: #6c91ac; /* Light blue-gray for labels */
    margin-bottom: 5px;
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    .form-container {
        padding: 15px;
    }

    h2 {
        font-size: 1.5rem;
    }

    input[type="text"],
    input[type="email"],
    input[type="number"],
    input[type="date"] {
        font-size: 14px;
    }

    button[type="submit"] {
        font-size: 14px;
    }
}

@media screen and (max-width: 480px) {
    .form-container {
        padding: 10px;
        margin: 10px;
    }

    h2 {
        font-size: 1.25rem;
    }

    input[type="text"],
    input[type="email"],
    input[type="number"],
    input[type="date"] {
        font-size: 12px;
    }

    button[type="submit"] {
        font-size: 12px;
    }
}

</style>
<body>

    <div class="form-container">
        <h2>Gangarama Perahera Ticket Booking</h2>
        <form action="tickets.php" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="total_adults">Number of Adults:</label>
            <input type="number" id="total_adults" name="total_adults" required>

            <label for="total_children">Number of Children:</label>
            <input type="number" id="total_children" name="total_children">

            <label for="booking_date">Booking Date:</label>
            <input type="date" id="booking_date" name="booking_date" required>

            <button type="submit" name="submit">Book Tickets</button>
        </form>
    </div>

</body>
</html>
