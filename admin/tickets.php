<?php include('../includes/dbconfig.php') ?>

<!-- fetch data from the tickets table -->
<?php
$sql = "SELECT * FROM tickets";
$result = $mysqli->query($sql);
$ticket_data = $result->fetch_all(MYSQLI_ASSOC);




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

<style>
    .rate-box {
        font-size: 24px;
        margin-bottom: 20px;
    }
</style>

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
                                    <h3>Tickets
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

                                    <li class="breadcrumb-item active">Tickets </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->

                <!-- Container-fluid starts-->
                 <!-- Rate Update Section -->
                 <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2>Ticket Records</h2>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="example">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ticket_data as $ticket) : ?>
                                                    <tr>
                                                        <td><?php echo $ticket['id'] ?></td>
                                                        <td><?php echo $ticket['name'] ?></td>
                                                        <td><?php echo $ticket['email'] ?></td>
                                                        <td><?php echo $ticket['booking_date'] ?></td>
                                                        <td><?php echo $ticket['total_amount'] ?></td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Footer -->
                                <footer class="footer">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6 footer-copyright text-start">
                                                <p class="mb-0">Copyright 2024 © Multikart All rights reserved.</p>
                                            </div>
                                            <div class="col-md-6 pull-right text-end">
                                                <p class="mb-0">Hand crafted & made with<i class="ri-heart-line"></i></p>
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