<?php
include('../includes/dbconfig.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['booking_id']) || !isset($_POST['total_amount'])) {
        die("Required fields are missing.");
    }

    $booking_id = $_POST['booking_id'];
    $total_amount = $_POST['total_amount'];

    // Validate if total amount is numeric
    if (!is_numeric($total_amount)) {
        die("Total amount must be a valid number.");
    }

    // Generate a unique reference number
    $reference_number = 'INV-' . strtoupper(uniqid());

    // Insert the invoice into the invoice table
    $sql = "INSERT INTO invoices (booking_id, total_amount, reference_number) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error);
    }

    $stmt->bind_param("ids", $booking_id, $total_amount, $reference_number);

    if ($stmt->execute()) {
        // Get the invoice_id of the newly inserted record
        $invoice_id = $mysqli->insert_id;

        // Fetch booking details for email
        $sql = "SELECT b.name, b.email, b.contact, h.hotel_name, b.check_in, b.check_out, b.adults, b.children, b.rooms, b.remark
                FROM booking b 
                JOIN hotel h ON b.hotel_id = h.hotel_id 
                WHERE b.id = ?";
        $stmt = $mysqli->prepare($sql);

        if (!$stmt) {
            die("Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error);
        }

        $stmt->bind_param("i", $booking_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $booking = $result->fetch_assoc();

        if ($booking) {
            // Send invoice email to the customer
            $to = $booking['email'];
            $subject = "Invoice for Your Booking #$booking_id";

            // HTML Email Message
            $message = "
            <html>
            <head>
            <title>Invoice for Your Booking #$booking_id</title>
            <style>
                body { font-family: Arial, sans-serif; color: #333; background-color: #f4f4f4; margin: 0; padding: 0;}
                .container { max-width: 600px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);}
                .header { text-align: center; background-color: #4CAF50; color: white; padding: 20px; border-radius: 8px;}
                .header h1 { margin: 0; }
                .invoice-details { margin: 20px 0;}
                .invoice-details p { margin: 10px 0;}
                .button { background-color: #4CAF50; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 5px; }
                .footer { text-align: center; color: #777; font-size: 12px; margin-top: 20px;}
            </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h1>Invoice for Booking #$booking_id</h1>
                    </div>
                    <div class='invoice-details'>
                        <p><strong>Dear " . $booking['name'] . ",</strong></p>
                        <p>Thank you for booking with us. Below are the details of your booking:</p>
                        <p><strong>Hotel:</strong> " . $booking['hotel_name'] . "</p>
                        <p><strong>Contact Number:</strong> " . $booking['contact'] . "</p>
                        <p><strong>Check In:</strong> " . $booking['check_in'] . "</p>
                        <p><strong>Check Out:</strong> " . $booking['check_out'] . "</p>
                        <p><strong>Adults:</strong> " . $booking['adults'] . "</p>
                        <p><strong>Children:</strong> " . $booking['children'] . "</p>
                        <p><strong>Rooms:</strong> " . $booking['rooms'] . "</p>
                        <p><strong>Remark:</strong> " . $booking['remark'] . "</p>
                        <hr>
                        <p><strong>Total Amount: Rs. $total_amount</strong></p>
                        <p><strong>Reference Number:</strong> $reference_number</p>
                    </div>
                    <div class='footer'>
                        <p>To make your payment, click the button below:</p>
                        <form action='https://touristboard.wp.gov.lk/admin/process_payment.php' method='POST'>
                            <input type='hidden' name='invoice_id' value='$invoice_id'>
                            <input type='hidden' name='reference_number' value='$reference_number'>
                            <input type='hidden' name='amount' value='$total_amount'>
                            <input type='submit' value='Pay Now' class='button'>
                        </form>
                    </div>
                </div>
            </body>
            </html>";

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
            $headers .= "From: icta123 <icta123@gmail.com>" . "\r\n";
            
            // Send the email
            if (mail($to, $subject, $message, $headers)) {
                echo "<script>alert('Invoice sent successfully!'); window.location.href = 'payments.php'; </script>";
            } else {
                echo "<script>alert('Failed to send the invoice.');</script>";
            }
        } else {
            echo "<script>alert('Failed to retrieve booking details.');</script>";
        }
    } else {
        echo "<script>alert('Failed to create an invoice: (" . $stmt->errno . ") " . $stmt->error . "');</script>";
    }
}
?>
