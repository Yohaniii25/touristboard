<?php
include('../includes/dbconfig.php');

// Check if the booking_id is set in the URL
if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // Fetch booking details
    $sql = "SELECT b.id, b.name, b.email, b.contact, h.hotel_name, b.check_in, b.check_out, b.adults, b.children, b.rooms, b.remark
            FROM booking b 
            JOIN hotel h ON b.hotel_id = h.hotel_id 
            WHERE b.id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $booking_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $booking = $result->fetch_assoc();

    if (!$booking) {
        echo "Booking not found.";
        exit;
    }
} else {
    echo "No booking selected.";
    exit;
}
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
        <?php include_once("includes/header.php"); ?>
        <!-- Page Header Ends -->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            <!-- Page Sidebar Start-->
            <?php include_once("includes/sidebar.php"); ?>
            <!-- Page Sidebar Ends-->



            <div class="page-body">
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="page-header-left">
                                    <h3>Add invoice
                                        <small>Sri Lanka Western Province Tourist Board</small>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ol class="breadcrumb pull-right">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">
                                            <i data-feather="home"></i>
                                        </a>
                                    </li>

                                    <li class="breadcrumb-item active">Create invoive</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->

                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row product-adding">

                                        <div class="col-xl-7">
                                            <!-- <form class="needs-validation add-product-form" novalidate="">
                                                <div class="form">
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom01"
                                                            class="col-xl-3 col-sm-4 mb-0">Title :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustom01"
                                                                type="text" required="">
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustom02"
                                                            class="col-xl-3 col-sm-4 mb-0">Price :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustom02"
                                                                type="text" required="">
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label for="validationCustomUsername"
                                                            class="col-xl-3 col-sm-4 mb-0">Product Code :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="validationCustomUsername"
                                                                type="text" required="">
                                                        </div>
                                                        <div class="invalid-feedback offset-sm-4 offset-xl-3">Please
                                                            choose Valid Code.</div>
                                                    </div>
                                                </div>
                                                <div class="form">
                                                    <div class="form-group row">
                                                        <label for="exampleFormControlSelect1"
                                                            class="col-xl-3 col-sm-4 mb-0">Select Size :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <select class="form-control digits"
                                                                id="exampleFormControlSelect1">
                                                                <option>Small</option>
                                                                <option>Medium</option>
                                                                <option>Large</option>
                                                                <option>Extra Large</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-sm-4 mb-0">Total Products :</label>
                                                        <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7">
                                                            <div class="input-group">
                                                                <input class="touchspin" type="text" value="1">
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-sm-4">Add Description :</label>
                                                        <div class="col-xl-8 col-sm-7 description-sm">
                                                            <textarea id="editor1" name="editor1" cols="10"
                                                                rows="4"></textarea>
                                                        </div>
                                                        <div class="offset-xl-3 offset-sm-4 mt-4">
                                                            <button type="submit" class="btn btn-primary">Add</button>
                                                            <button type="button" class="btn btn-light">Discard</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form> -->


                                            <h3>Generate Invoice for Booking <?php echo $booking_id; ?></h3>
                                            <form action="process_invoice.php" method="POST">
                                                <input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">
                                                <p>Customer Name: <?php echo $booking['name']; ?></p>
                                                <p>Email: <?php echo $booking['email']; ?></p>
                                                <p>Contact: <?php echo $booking['contact']; ?></p>
                                                <p>Hotel Name: <?php echo $booking['hotel_name']; ?></p>
                                                <p>Check In: <?php echo $booking['check_in']; ?></p>
                                                <p>Check Out: <?php echo $booking['check_out']; ?></p>
                                                <p>Adults: <?php echo $booking['adults']; ?></p>
                                                <p>Children: <?php echo $booking['children']; ?></p>
                                                <p>Rooms: <?php echo $booking['rooms']; ?></p>
                                                <p>Remark: <?php echo $booking['remark']; ?></p>

                                                <label for="total_amount">Total Amount:</label>
                                                <input type="number" name="total_amount" required>
                                                <button type="submit">Send Invoice</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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

    <!-- touchspin js-->
    <script src="assets/js/touchspin/vendors.min.js"></script>
    <script src="assets/js/touchspin/touchspin.js"></script>
    <script src="assets/js/touchspin/input-groups.min.js"></script>

    <!-- form validation js-->
    <script src="assets/js/dashboard/form-validation-custom.js"></script>

    <!-- ckeditor js-->
    <script src="assets/js/editor/ckeditor/ckeditor.js"></script>
    <script src="assets/js/editor/ckeditor/ckeditor.custom.js"></script>

    <!-- Zoom js-->
    <script src="assets/js/jquery.elevatezoom.js"></script>
    <script src="assets/js/zoom-scripts.js"></script>

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