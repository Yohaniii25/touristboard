<?php

include('includes/function.php');

$dest_id = $_GET['dest_id'];

$hotels = showhotels($dest_id);
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>All Hotels</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/logo/logo_.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald:200,300,400,500,700%7CMontserrat:400,500,600">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('preloader.php'); ?>
    <div class="page">
        <?php
        include('header.php');
        ?>

        <!-- Breadcrumbs-->
        <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(./images/home/new_bread.jpg);" data-preset='{"title":"Breadcrumbs","category":"header","reload":false,"id":"breadcrumbs"}'>
            <div class="container">
                <h4 class="breadcrumbs-custom-title">Hotels</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="home.php">Home</a></li>
                    <li class="active">Hotels</li>
                </ul>
            </div>
        </section>

        <!-- includes sticky.php -->
        <?php include('sticky.php'); ?>

        <!--Hotels-->
        <!--Hotels-->
        <section class="section section-lg bg-default">
            <div class="container">
                <h2 class="text-center text-md-start">Explore Top Hotels Around Destination</h2>
                <div class="row row-40 offset-lg row-xl-40">

                <?php

                while ($row = mysqli_fetch_assoc($hotels)) {
                    
                    echo "
                    <div class='col-lg-4 col-md-6 wow fadeInUp' data-wow-delay='.9s'>
                        <div class='service-box-creative zoom'>
                            <a class='service-box-creative__media' href='./single_hotel.php?hotel_id=" . $row['hotel_id'] . "&dest_id=" . $_GET['dest_id'] . "'>
                                <img style='border-radius: 0px 20px 0px 20px;' src='images/hotels/sample1.jpg' width='370' height='288' />
                            </a>
                            <div class='service-box-creative__caption'>
                                <h4 class='service-box-creative__title'>".$row['hotel_name']."</h4>
                                
                            </div>
                        </div>

                    </div>

                    ";
                }
                
                ?>

                </div>
            </div>
        </section>


        <?php
        include('footer.php'); ?>
    </div>

    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>