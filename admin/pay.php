<?php
include('../includes/dbconfig.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    <title>Sri Lanka Western Province Touristboard</title>

    <!-- Google font-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>


    <!-- page-wrapper Start-->
    <div class="page-wrapper">

        <!-- Page Header Start-->

        <!-- Page Header Ends -->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            <!-- Page Sidebar Start-->

            <!-- Page Sidebar Ends-->


            <div class="page-body">


                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="card">
                        <div class="row product-page-main card-body">

                            <div class="col-xl-12">
                                <div style="text-align: center;" class="product-page-details product-right mb-0">
                                    <h2 style="text-align: center !important;">Pay Here</h2>

                                    <hr>
                                    <h6 class="product-title">Invoice Details</h6>
                                    <p>Do your payment to complete booking</p>

                                    <?php
                                    if (isset($_GET['invoice_id']) && isset($_GET['reference_number']) && isset($_GET['amount'])) {
                                        $invoice_id = $_GET['invoice_id'];
                                        $reference_number = $_GET['reference_number'];
                                        $total_amount = $_GET['amount'];

                                        // Debugging lines to ensure parameters are set
                                        // echo "Debug - Invoice ID: " . $invoice_id . "<br>";
                                        // echo "Debug - Reference Number: " . $reference_number . "<br>";
                                        // echo "Debug - Total Amount: " . $total_amount . "<br>";

                                        // Fetch booking details (optional)
                                        $sql = "SELECT b.name, b.email FROM booking b WHERE b.id = (SELECT booking_id FROM invoices WHERE invoice_id = ?)";
                                        $stmt = $mysqli->prepare($sql);
                                        $stmt->bind_param("i", $invoice_id);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        $booking = $result->fetch_assoc();

                                        if ($booking) {
                                            // Display payment details and the "Pay Now" button with provided classes
                                            echo "<div class='product-title'>
               
              </div>";
                                            echo "<div class='product-price digits mt-2'>
                <h3>Rs .$total_amount.00</h3>
                <h3>Reference Number: $reference_number</h3>
              </div>";
                                            echo "<form action='process_payment.php' method='POST'>
                <input type='hidden' name='invoice_id' value='$invoice_id'>
                <input type='hidden' name='reference_number' value='$reference_number'>
                <input type='hidden' name='amount' value='$total_amount'>
                <input type='submit' value='Pay Now' class='btn btn-secondary'>
              </form>";
                                        } else {
                                            echo "Error: Booking details not found.";
                                        }
                                    } else {
                                        echo "Error: Invoice details not found.";
                                    }
                                    ?>

                                    <hr>

                                    <div class="m-t-15">

                                       
                                    </div>
                                    </d>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Container-fluid Ends-->
                </div>

                <!-- footer start-->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 footer-copyright text-start">
                                <p class="mb-0">Copyright 2024 © Multikart All rights reserved.</p>
                            </div>
                            <div class="col-md-6 pull-right text-end">
                                <p class=" mb-0">Hand crafted & made with<i class="ri-heart-line"></i></p>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- footer end-->
            </div>
        </div>

        <div class="bottom-space"></div>

        <!-- latest jquery-->
        <script src="assets/js/jquery-3.3.1.min.js"></script>

        <!-- Bootstrap js-->
        <script src="assets/js/bootstrap.bundle.min.js"></script>

        <!-- feather icon js-->
        <script src="assets/js/icons/feather-icon/feather.min.js"></script>
        <script src="assets/js/icons/feather-icon/feather-icon.js"></script>

        <!-- Sidebar jquery-->
        <script src="assets/js/sidebar-menu.js"></script>

        <!-- Touchspin Js-->
        <script src="assets/js/touchspin/vendors.min.js"></script>
        <script src="assets/js/touchspin/touchspin.js"></script>
        <script src="assets/js/touchspin/input-groups.min.js"></script>

        <!-- Rating Js-->
        <script src="assets/js/rating/jquery.barrating.js"></script>
        <script src="assets/js/rating/rating-script.js"></script>

        <!-- Owlcarousel js-->
        <script src="assets/js/owlcarousel/owl.carousel.js"></script>
        <script src="assets/js/dashboard/product-carousel.js"></script>

        <!--Customizer admin-->
        <script src="assets/js/admin-customizer.js"></script>

        <!-- lazyload js-->
        <script src="assets/js/lazysizes.min.js"></script>

        <!--right sidebar js-->
        <script src="assets/js/chat-menu.js"></script>

        <!--script admin-->
        <script src="assets/js/admin-script.js"></script>

</body>

</html>