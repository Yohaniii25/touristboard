<?php

session_start();


// Extract parameters
$resultIndicator = $_GET['resultIndicator'] ?? null;
$successkey = $_SESSION['successkey'] ?? null;
$amount = $_SESSION['amount'] ?? null;
$orderid = $_SESSION['orderid'] ?? null;

session_destroy(); // Destroy session after processing

if ($resultIndicator == $successkey) {
    include('./includes/dbconfig.php');

    $sql = "
    SELECT 
        b.name, 
        b.email, 
        b.contact, 
        h.hotel_name, 
        i.reference_number 
    FROM 
        booking b 
    JOIN 
        hotel h ON b.hotel_id = h.hotel_id 
    JOIN 
        invoices i ON b.id = i.booking_id 
    WHERE 
        i.invoice_id = ?
";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error);
    }

    $stmt->bind_param("i", $orderid);
    if (!$stmt->execute()) {
        die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
    }

    $result = $stmt->get_result();
    $booking = $result->fetch_assoc();

    if ($booking) {
        $admin_email = 'yohanii725@gmail.com';
        $subject = "Payment Receipt for Invoice #$orderid";
        $message = "
        <html>
        <head><title>Payment Receipt</title></head>
        <body>
            <h2>Payment Details</h2>
            <p>Amount: Rs. $amount</p>
            <p>Customer: " . htmlspecialchars($booking['name']) . "</p>
            <p>Reference Number: " . htmlspecialchars($booking['reference_number']) . "</p>
            <p>Hotel: " . htmlspecialchars($booking['hotel_name']) . "</p>
            
        </body>
        </html>";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From: no-reply@touristboard.wp.gov.lk\r\n";

        if (!mail($admin_email, $subject, $message, $headers)) {
            file_put_contents('email_error.log', "Failed to send email\n", FILE_APPEND);
        }
    }

    header("Location: payment_success.php?invoice_id=$orderid&amount=$amount");
    exit;
} else {
    header("Location: payment_unsuccess.php");
    exit;
}
?>
