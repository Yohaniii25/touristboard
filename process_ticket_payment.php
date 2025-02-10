<?php
session_start();
include('includes/dbconfig.php');

// Check if ticket ID exists in session
if (!isset($_SESSION['ticket_order_id'])) {
    die("Error: Ticket ID is missing in session.");
}

$ticket_id = $_SESSION['ticket_order_id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$booking_date = $_SESSION['booking_date'];
$total_adults = $_SESSION['total_adults'];
$total_children = $_SESSION['total_children'];
$total_amount = $_SESSION['total_amount'];

// Call IPG Payment function
ipg_start($total_amount, $ticket_id, "Ticket Booking for " . $name, $mysqli);

function ipg_start($amount, $order_id, $description, $mysqli) {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://test-bankofceylon.mtf.gateway.mastercard.com/api/rest/version/81/merchant/TEST700193990411/session',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Basic bWVyY2hhbnQuVEVTVDcwMDE5Mzk5MDQxMTpjMjk1MTk5ZDkyOTQ3NGE0MjY1ZjQ5MjVkMmFlMTc2OA==' // Replace with actual credentials
        ],
        CURLOPT_POSTFIELDS => json_encode([
            'apiOperation' => 'INITIATE_CHECKOUT',
            'checkoutMode' => 'WEBSITE',
            'interaction' => [
                'operation' => 'PURCHASE',
                'merchant' => [
                    'name' => 'Tourist Board',
                    'url' => 'https://touristboard.wp.gov.lk/'
                ],
                'returnUrl' => 'https://touristboard.wp.gov.lk/ticket-pay-complete.php?order_id=' . $order_id
            ],
            'order' => [
                'currency' => 'LKR',
                'amount' => $amount,
                'id' => $order_id,
                'description' => $description
            ]
        ]),
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);

    if ($error) {
        die("cURL Error: " . $error);
    }

    $data = json_decode($response, true);

    if (isset($data['session']['id'])) {
        $session_id = $data['session']['id'];

        echo '
        <html>
            <head>
                <script src="https://test-bankofceylon.mtf.gateway.mastercard.com/static/checkout/checkout.min.js"
                        data-error="errorCallback" data-cancel="cancelCallback"></script>
                <script>
                    function errorCallback(error) { console.log(JSON.stringify(error)); }
                    function cancelCallback() { console.log("Payment cancelled"); }
                    Checkout.configure({ session: { id: \'' . $session_id . '\' } });
                </script>
            </head>
            <body>
                <div id="embed-target"></div>
                <script>window.onload = function() { Checkout.showPaymentPage(); }</script>
            </body>
        </html>';
    } else {
        die("Error: Payment session could not be created.");
    }
}
?>
