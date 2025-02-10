<?php include('../includes/dbconfig.php') ?>

<!-- fetch data from the booking table -->

<?php
$sql = "SELECT b.id, b.name, b.contact, b.email, h.hotel_name, b.adults, b.children, b.rooms, b.check_in, b.check_out, b.remark, b.status
FROM booking b
JOIN hotel h ON b.hotel_id = h.hotel_id"; // Assuming you have a hotels table for hotel names

$result = $mysqli->query($sql);

// Check if the form has been submitted for approval or rejection
if (isset($_POST['approve']) || isset($_POST['reject'])) {
    // Get the booking ID
    $booking_id = $_POST['id'];
    
    // Determine the status based on the button clicked
    $status = isset($_POST['approve']) ? 1 : 0;
    
    // Update the status in the database
    $update_sql = "UPDATE booking SET status = ? WHERE id = ?";
    $stmt = $mysqli->prepare($update_sql);
    $stmt->bind_param("ii", $status, $booking_id);
    
    if ($stmt->execute()) {
        // If successful, redirect to avoid form resubmission
        header("Location: booking.php");
        exit();
    } else {
        echo "Error updating booking status: " . $mysqli->error;
    }
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

            <!-- Right sidebar Start-->

            <!-- Right sidebar Ends-->

            <div class="page-body">
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="page-header-left">
                                    <h3>Booking List
                                        <small>Sri Lanka Tourist Board</small>
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

                                    <li class="breadcrumb-item active">Order List</li>
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
                                <div class="card-header">
                                    <form class="form-inline search-form search-box">
                                        <div class="form-group">
                                            <input class="form-control-plaintext" type="search" placeholder="Search..">
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table-desi">
                                        <table class="table all-package order-list-table" id="editableTable">
                                            <thead>
                                                <tr>
                                                    <th>Booking ID</th>
                                                    <th>Customer Name</th>
                                                    <th>Contact Number</th>
                                                    <th>Email</th>
                                                    <th>Hotel Name</th>
                                                    <th>Adults</th>
                                                    <th>Children</th>
                                                    <th>Rooms</th>
                                                    <th>Check In</th>
                                                    <th>Check Out</th>
                                                    <th>Remarks</th>
                                                    <th>Status</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($result->num_rows > 0) {
                                                    // Loop through and display data
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row['id'] . "</td>";
                                                        echo "<td>" . $row['name'] . "</td>";
                                                        echo "<td>" . $row['contact'] . "</td>";
                                                        echo "<td>" . $row['email'] . "</td>";
                                                        echo "<td>" . $row['hotel_name'] . "</td>";
                                                        echo "<td>" . $row['adults'] . "</td>";
                                                        echo "<td>" . $row['children'] . "</td>";
                                                        echo "<td>" . $row['rooms'] . "</td>";
                                                        echo "<td>" . $row['check_in'] . "</td>";
                                                        echo "<td>" . $row['check_out'] . "</td>";
                                                        echo "<td>" . $row['remark'] . "</td>";

                                                        $status_text = $row['status'] == 1 ? 'Approved' : 'Not Approved';
                                                        echo "<td>" . $status_text . "</td>";

                                                        echo "<td>
                <form method='POST' action=''>
                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                    <button type='submit' name='approve' class='btn btn-success btn-sm'>Approve</button>
                    <button type='submit' name='reject' class='btn btn-danger btn-sm'>Not Approve</button>
                </form>
              </td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='12'>No bookings found.</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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

    <!-- Edit, delete and add new -->
    <script src="assets/js/edit-delete-new-product.js"></script>

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