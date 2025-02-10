<?php
include('../includes/dbconfig.php');
include('../includes/function.php');

if (isset($_GET['news_id'])) {
    $news_id = $_GET['news_id'];

    $sql = "SELECT * FROM news WHERE news_id = ?";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        die("Error preparing query: " . $mysqli->error);
    }
    $stmt->bind_param('i', $news_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $news = $result->fetch_assoc();

    if (!$news) {
        echo "<script>alert('News not found!'); window.location.href='news-list.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('News ID not found!'); window.location.href='news-list.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $published_date = $_POST['published_date'];
    $author = $_POST['author'];

    if (isset($_FILES['main_image_url']) && !empty($_FILES['main_image_url']['name'])) {
        $main_image_url = time() . "_" . $_FILES['main_image_url']['name']; 
        $main_image_url_tmp = $_FILES['main_image_url']['tmp_name'];

        if (!empty($news['main_image_url']) && file_exists("../images/news/" . $news['main_image_url'])) {
            unlink("../images/news/" . $news['main_image_url']);
        }

        move_uploaded_file($main_image_url_tmp, "../images/news/$main_image_url");
    } else {
        $main_image_url = $news['main_image_url']; 
    }

    $gallery_images = isset($_FILES['gallery_images']['name']) ? $_FILES['gallery_images']['name'] : [];
    $gallery_images_temp = isset($_FILES['gallery_images']['tmp_name']) ? $_FILES['gallery_images']['tmp_name'] : [];

    // Check if "Remove All Gallery Images" checkbox is checked
    if (isset($_POST['remove_gallery_images']) && $_POST['remove_gallery_images'] == 1) {
        // Remove old gallery images from folder
        $old_gallery_images = explode(',', $news['gallery_images']);
        foreach ($old_gallery_images as $old_image) {
            if (!empty($old_image) && file_exists("../images/news/n_gallery/" . $old_image)) {
                unlink("../images/news/n_gallery/" . $old_image);
            }
        }
        $gallery_images = ""; // Set empty in database
    } else {
        if (!empty($gallery_images[0])) {
            // Remove old gallery images before adding new ones
            $old_gallery_images = explode(',', $news['gallery_images']);
            foreach ($old_gallery_images as $old_image) {
                if (!empty($old_image) && file_exists("../images/news/n_gallery/" . $old_image)) {
                    unlink("../images/news/n_gallery/" . $old_image);
                }
            }

            $new_gallery_images = [];
            foreach ($gallery_images as $key => $gallery_image) {
                $new_file_name = time() . "_" . $gallery_image; 
                move_uploaded_file($gallery_images_temp[$key], "../images/news/n_gallery/$new_file_name");
                $new_gallery_images[] = $new_file_name;
            }
            $gallery_images = implode(',', $new_gallery_images);
        } else {
            $gallery_images = $news['gallery_images']; 
        }
    }


    $query = "UPDATE news SET title = ?, content = ?, main_image_url = ?, gallery_images = ?, published_date = ?, author = ? WHERE news_id = ?";
    $stmt = $mysqli->prepare($query);

    if (!$stmt) {
        die("Error preparing query: " . $mysqli->error);
    }

    $stmt->bind_param("ssssssi", $title, $content, $main_image_url, $gallery_images, $published_date, $author, $news_id);

    if ($stmt->execute()) {
        echo "<script>alert('News updated successfully!'); window.location.href='news-list.php';</script>";
    } else {
        echo "<script>alert('Failed to update news!');</script>";
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
                                                            <input class="form-control" id="title" name="title" type="text" value="<?= htmlspecialchars($news['title']) ?>" required>
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>

                                                    <!-- Main Image -->
                                                    <div class="form-group mb-3 row">
                                                        <label for="main_image_url" class="col-xl-3 col-sm-4 mb-0">Main Image :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <?php if (!empty($news['main_image_url'])): ?>
                                                                <img src="../images/news/<?= $news['main_image_url'] ?>" width="150"><br>
                                                                <input type="checkbox" name="remove_main_image_url" value="1"> Remove
                                                            <?php endif; ?>
                                                            <input class="form-control mt-2" id="main_image_url" name="main_image_url" type="file">
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>

                                                    <!-- Content -->
                                                    <div class="form-group mb-3 row">
                                                        <label for="content" class="col-xl-3 col-sm-4 mb-0">Content :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <textarea class="form-control" id="content" name="content" rows="6" required><?= htmlspecialchars($news['content']) ?></textarea>
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>

                                                    <!-- Gallery Images -->
                                                    <div class="form-group mb-3 row">
                                                        <label for="gallery_images" class="col-xl-3 col-sm-4 mb-0">Gallery Images :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <?php if (!empty($news['gallery_images'])): ?>
                                                                <?php $gallery_images = explode(',', $news['gallery_images']); ?>
                                                                <?php foreach ($gallery_images as $image): ?>
                                                                    <div class="d-inline-block m-1">
                                                                        <img src="../images/news/n_gallery/<?= $image ?>" width="100">
                                                                        <input type="checkbox" name="remove_gallery_images[]" value="<?= $image ?>"> Remove
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                            <input class="form-control mt-2" id="gallery_images" name="gallery_images[]" type="file" multiple>
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                        <label for="gallery_images" class="col-xl-3 col-sm-4 mb-0">
                                                            <input type="checkbox" name="remove_gallery_images" value="1">
                                                            <strong>Remove all gallery images</strong>
                                                        </label>

                                                    </div>

                                                    <!-- Published Date -->
                                                    <div class="form-group mb-3 row">
                                                        <label for="published_date" class="col-xl-3 col-sm-4 mb-0">Published Date :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="published_date" name="published_date" type="date" value="<?= htmlspecialchars($news['published_date']) ?>" required>
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>

                                                    <!-- Author -->
                                                    <div class="form-group mb-3 row">
                                                        <label for="author" class="col-xl-3 col-sm-4 mb-0">Author :</label>
                                                        <div class="col-xl-8 col-sm-7">
                                                            <input class="form-control" id="author" name="author" type="text" value="<?= htmlspecialchars($news['author']) ?>" required>
                                                        </div>
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>

                                                    <!-- Submit & Discard Buttons -->
                                                    <div class="offset-xl-3 offset-sm-4 mt-4">
                                                        <button type="submit" class="btn btn-primary">Update News</button>
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