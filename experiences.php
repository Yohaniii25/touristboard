<?php

include('includes/function.php');

// show all experiences
$experiences = showexperiences();

// get search experiences by keyword
if (isset($_GET['keyword']) && isset($_GET['exp_district'])) {
  $keyword = $_GET['keyword'];
  $exp_district = $_GET['exp_district'];
  $experiences = showexperiences_bykeyword($keyword, $exp_district);
} else {
  $experiences = showexperiences();
}

// get search experiences by exp_district
if (isset($_GET['exp_district'])) {
  $exp_district = $_GET['exp_district'];
} else {
  $exp_district = "";
}

// show searched experiences
if (isset($_GET['keyword']) || isset($_GET['exp_district'])) {
  $experiences = showexperiences_bykeyword($keyword, $exp_district);
} else {
  $experiences = showexperiences();
}


?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Experiences</title>
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

    <!-- Breadcrumbs-->
    <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(./images/home/new_bread.jpg);" data-preset='{"title":"Breadcrumbs","category":"header","reload":false,"id":"breadcrumbs"}'>
      <div class="container">
        <h4 class="breadcrumbs-custom-title">Experiences</h4>
        <ul class="breadcrumbs-custom-path">
          <li><a href="home.php">Home</a></li>
          <li class="active">Experiences</li>
        </ul>
      </div>
    </section>

    <!-- includes sticky.php -->
    <?php include('sticky.php'); ?>

    <!--Experiences-->
    <section class="section section-lg bg-default">
      <div class="container">
        <h2 style="font-weight: bold; font-family: 'Quintessential', serif; text-transform: capitalize;" class="text-center text-md-start">Explore Top tours Around Western Province</h2>
        <div class="row row-40 offset-lg row-xl-40">


          <!-- filters  -->
          <div>
            <div class="gt-form container">
              <form method="get" action="experiences.php">
                <div class="search-content">
                  <div class="gt-col">
                    <div class="gt-inner">
                      <input name="keyword" type="text" placeholder="e.g. Seethawaka, Kelaniya" value="">
                    </div>
                  </div>

                  <div class="gt-col">
                    <div class="gt-inner">
                      <select name="exp_district" class="gt-select" data-live-search="false" tabindex="-98">
                        <option value="">District</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Kaluthara">Kaluthara</option>
                        <option value="Gampaha">Gampaha</option>
                      </select>
                    </div>
                  </div>

                  <div class="gt-col">
                    <div class="gt-inner">
                      <button type="submit" class="gt-submit">Search</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>

          </div>

          <!-- filters  -->

          <!-- display all tours as three columns ans suitable rows -->
          <?php

          while ($row = mysqli_fetch_assoc($experiences)) {

            echo "
  <div class='col-lg-4 col-md-6 wow fadeInUp' data-wow-delay='.9s'>
  <div class='service-box-creative'><a style='border-radius: 0px 30px;' class='zoom service-box-creative__media' href='single_package.php?exp_id=" . $row['exp_id'] . "'><img style='    border-radius: 0px 30px 0px 30px;' src='images/tour/" . $row['exp_image'] . "' alt='' width='370' height='288' /></a>
  <div class='service-box-creative__caption'>
  <h5><a href='tours.php'>" . $row['exp_name'] . "</a></h5>
  <!-- <div class='price-group'><span class='price-group__sale'>$1500.00</span><span class='price-group__price-old'>$1655.00</span></div> -->
  <p class='shorttext'>" . $row['exp_desc'] . "</p>

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