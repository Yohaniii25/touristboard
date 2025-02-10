<?php include('../includes/dbconfig.php') ?>

<!-- fetch data from the booking table -->

<?php
$result = $mysqli->query("SELECT rate FROM daily_dollar_rates WHERE id = 1");
$row = $result->fetch_assoc();
$current_rate = $row['rate'] ?? 'Not_Set';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_rate'])) {
    $new_rate = floatval($_POST['rate']);

    $stmt = $mysqli->prepare("UPDATE daily_dollar_rates SET rate = ?, date = CURDATE() WHERE id = 1");
    $stmt->bind_param('d', $new_rate);

    if ($stmt->execute()) {
        $current_rate = number_format($new_rate, 2);
        $message = 'Rate updated successfully';
    } else {
        $message = 'Failed to update rate';
    }

    $stmt->close();
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
                                    <h3>Dollar Rate
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

                                    <li class="breadcrumb-item active">Dollar Rate </li>
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
                                    <h5>1$ -> <?= $current_rate ?> Sri Lankan Rupee</h5>
                                    <h4><?= date('Y-m-d') ?></h4>
                                </div>
                                <div class="card-body">
                                    <?php if (isset($message)): ?>
                                        <div class="alert alert-info"><?= $message ?></div>
                                    <?php endif; ?>
                                    <form method="POST">
                                        <div class="rate-box">
                                            <label for="rate">Update Rate</label>
                                            <input type="number" name="rate" id="rate" class="form-control" value="<?= number_format($current_rate, 2) ?>" step="0.01" required>
                                        </div>
                                        <button type="submit" name="update_rate" class="btn btn-primary">Update Rate</button>
                                    </form>
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