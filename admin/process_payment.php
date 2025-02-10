<?php session_start();

function ipg_start($amount, $invoice_id)
{
    // Initialize cURL
    $curl = curl_init();

    // Prepare the POST request to the payment gateway
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://test-bankofceylon.mtf.gateway.mastercard.com/api/rest/version/81/merchant/TEST700193990411/session',  // API endpoint
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode(array(
            "apiOperation" => "INITIATE_CHECKOUT",
            "checkoutMode" => "WEBSITE",
            "interaction" => array(
                "operation" => "PURCHASE",
                "merchant" => array(
                    "name" => "Tourist Board",
                    "url" => "https://touristboard.wp.gov.lk/"
                ),
                "returnUrl" => "https://touristboard.wp.gov.lk/complete.php"   // Return URL after payment is completed
            ),
            "order" => array(
                "id" => $invoice_id,         // Use invoice_id as the order ID
                "currency" => "LKR",
                "amount" => $amount,
                // "reference_number" => $reference_number
            )
        )),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Basic bWVyY2hhbnQuVEVTVDcwMDE5Mzk5MDQxMTpjMjk1MTk5ZDkyOTQ3NGE0MjY1ZjQ5MjVkMmFlMTc2OA==' // Replace with your actual API key
        ),
    ));

    // Execute cURL request and store the response
    $response = curl_exec($curl);
    
    // var_dump($response);
    // // echo "done";
    curl_close($curl);

    // Log the response for debugging (if needed)
    file_put_contents('payment_response.log', $response . "\n", FILE_APPEND);

    // Decode the response into an array
    $data = json_decode($response, true);

    // Check if session ID is present in the response
    if (isset($data['session']['id'])) {
        $session_id = $data['session']['id'];
        
       $successkey= $data['successIndicator'];
       
                 $_SESSION['successkey']=$successkey;
      $_SESSION['orderid']=$invoice_id;
      $_SESSION['amount']=$amount;
       

       
        

        // Build the URL to redirect the user to the payment page
        $payment_url = 'https://test-bankofceylon.mtf.gateway.mastercard.com/checkout/pay/' . $session_id . '?checkoutVersion=1.0.0';

        // Redirect the user to the payment page
        header("Location: $payment_url");
        exit;  // Ensure no further code is executed after redirection
    } else {
        // If session ID is missing, print the error and exit
        echo "Error: Could not retrieve session ID. Response: " . $response;
        exit;
    }
}

// Retrieve parameters from the form
if (isset($_POST['invoice_id']) && isset($_POST['amount'])) {
    $invoice_id = $_POST['invoice_id'];
    $reference_number = $_POST['reference_number'];
    $amount = $_POST['amount'];

    // Call the payment gateway function with the data
    ipg_start($amount, $invoice_id, $reference_number);
    

       
} else {
    echo "Error: Missing parameters. Ensure 'invoice_id', 'reference_number', and 'amount' are provided.";
}

// If payment is successful, send receipt to admin (after payment gateway response)
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['successIndicator'])) {
    // Retrieve the order ID and amount from the session
    $invoice_id = $_SESSION['orderid'];
    $amount = $_SESSION['amount'];
    $successIndicator = $_SESSION['successkey'];
    // $amount = $_SESSION['amount'];
    // $reference_number = $_SESSION['reference_number'];

    // Send the receipt to the admin
    $to = 'yohanii725@gmail.com';  // Admin email
    $subject = 'Payment Received for Invoice #' . $invoice_id;
    $message = "Payment of Rs. $amount received for Invoice #$invoice_id. Success Indicator: $successIndicator";
    $headers = "From: icta123 <icta123@gmail.com>";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Payment successful! Receipt sent to admin.'); window.location.href = 'payments.php'; </script>";
    } else {
        echo "<script>alert('Payment successful! Failed to send receipt to admin.');</script>";
    }

    // Clear the session variables
    unset($_SESSION['orderid']);
    unset($_SESSION['amount']);
    unset($_SESSION['successkey']);

    // Redirect to the payments page
    header("Location: payments.php");
    exit;

}





?>
