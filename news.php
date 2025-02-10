<?php ?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="images/logo/logo_.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald:200,300,400,500,700%7CMontserrat:400,500,600">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/style.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=Protest+Revolution&family=Quintessential&display=swap" rel="stylesheet">
</head>

<body>
  <?php include('preloader.php'); ?>
  <div class="page">
    <?php
    include('header.php');
    ?>
    <?php
    include('includes/function.php');
    ?>

    <!-- Breadcrumbs-->
    <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(./images/home/new_bread.jpg);" data-preset='{"title":"Breadcrumbs","category":"header","reload":false,"id":"breadcrumbs"}'>
      <div class="container">
        <h4 class="breadcrumbs-custom-title">News</h4>
        <ul class="breadcrumbs-custom-path">
          <li><a href="home.php">Home</a></li>
          <li class="active">News</li>
        </ul>
      </div>
    </section>

    <!-- includes sticky.php -->
    <?php include('sticky.php'); ?>

    <section class="section section-lg bg-image-8">
      <div class="container">
        <h2 style="font-weight: bold; font-family: 'Quintessential', serif; text-transform: capitalize;" class="text-center text-sm-start">Our News</h2>
        <div class="row row-40 offset-lg">
          <?php displayNews(); ?>
        </div>
      </div>
    </section>

    <!--Footer-->
    <?php
    include('footer.php');
    ?>
  </div>
  <div class="snackbars" id="form-output-global"></div>
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>