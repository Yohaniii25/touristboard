<?php include('../includes/dbconfig.php') ?>

<!-- add function.php -->
<?php include('../includes/function.php'); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    global $mysqli; 
    
    $title = $_POST['title'];
    $content = $_POST['content'];
    $published_date = $_POST['published_date'];
    $author = $_POST['author'];

    $main_image = $_FILES['main_image']['name'] ?? '';
    $main_image_temp = $_FILES['main_image']['tmp_name'] ?? '';

    if ($main_image) {
        move_uploaded_file($main_image_temp, "../images/news/$main_image");
    }

    $gallery_images_list = [];

    if (!empty($_FILES['gallery_images']['name'][0])) {
        foreach ($_FILES['gallery_images']['name'] as $key => $gallery_image) {
            $gallery_image_temp = $_FILES['gallery_images']['tmp_name'][$key];

            if ($gallery_image) {
                move_uploaded_file($gallery_image_temp, "../images/news/n_gallery/$gallery_image");
                $gallery_images_list[] = $gallery_image;
            }
        }
    }

    $gallery_images_str = implode(",", $gallery_images_list);

    $query = "INSERT INTO news (title, content, main_image_url, gallery_images, published_date, author) 
              VALUES ('$title', '$content', '$main_image', '$gallery_images_str', '$published_date', '$author')";

    $result = mysqli_query($mysqli, $query);

    if ($result) {
        echo "<script>alert('News added successfully!'); window.location.href='news-list.php';</script>";
    } else {
        echo "<script>alert('Failed to add news!');</script>";
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
                                    <h3>Add News
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

                                    <li class="breadcrumb-item active">Add News</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row product-adding">

                                        <div class="col-xl-7">
                                            <form action="" method="post" class="needs-validation add-news-form" enctype="multipart/form-data" novalidate="">
                                                <div class="form">
                                                    <!-- Title -->
                                                    <div class="form-group mb-3 row">
                                                        <label for="title" class="col-xl-3 col-sm-4 mb-0">Title :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="title" name="title" type="text" required="">
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>

                                                    <!-- Main Image -->
                                                    <div class="form-group mb-3 row">
                                                        <label for="main_image" class="col-xl-3 col-sm-4 mb-0">Main Image :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="main_image" name="main_image" type="file" required="">
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>

                                                    <!-- Content -->
                                                    <div class="form-group mb-3 row">
                                                        <label for="content" class="col-xl-3 col-sm-4 mb-0">Content :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <textarea class="form-control" id="content" name="content" rows="6" required=""></textarea>
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>

                                                    <!-- Gallery Images -->
                                                    <div class="form-group mb-3 row">
                                                        <label for="gallery_images" class="col-xl-3 col-sm-4 mb-0">Gallery Images :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="gallery_images" name="gallery_images[]" type="file" multiple="">
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>

                                                    <!-- Published Date -->
                                                    <div class="form-group mb-3 row">
                                                        <label for="published_date" class="col-xl-3 col-sm-4 mb-0">Published Date :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="published_date" name="published_date" type="date" required="">
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>

                                                    <!-- Author -->
                                                    <div class="form-group mb-3 row">
                                                        <label for="author" class="col-xl-3 col-sm-4 mb-0">Author :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="author" name="author" type="text" required="">
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>

                                                    <!-- Submit & Discard Buttons -->
                                                    <div class="offset-xl-3 offset-sm-4 mt-4">
                                                        <button type="submit" class="btn btn-primary">Add News</button>
                                                        <button type="reset" class="btn btn-light">Discard</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->


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