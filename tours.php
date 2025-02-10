<?php

include('includes/function.php');

$destinations = showdestinations();

// get searched by keyword
if (isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];
} else {
  $keyword = "";
}

// get searched by district
if (isset($_GET['district'])) {

  $district = $_GET['district'];

  $catname = ($district == "Colombo") ? "Colombo" : (($district == "Kaluthara") ? "Kaluthara" : (($district == "Gampaha") ? "Gampaha" : ""));
} else {
  $district = "";
}

// get searched by category
if (isset($_GET['category'])) {

  $category = $_GET['category'];

  $catname = ($category == "1") ? "Major" : (($category == "2") ? "heritage" : (($category == "3") ? "Environment" : (($category == "4") ? "Leisure & Recreation" : (($category == "5") ? "pristine" : (($category == "6") ? "thrills bliss scenic" : (($category == "7") ? "wild,thrills" : (($category == "8") ? "Multi Culturalism" : (($category == "9") ? "Art and Craft" : (($category == "10") ? "Mice" : (($category == "11") ? "Museum" : (($category == "12") ? "Colombo Life" : (($category == "13") ? "Sports" : (($category == "14") ? "Agro" : (($category == "15") ? "Religious" : (($category == "16") ? "Meditation" : "")))))))))))))));
} else {
  $category = "";
}

// get searched by segment
if (isset($_GET['segment'])) {

  $segment = $_GET['segment'];

  $segname = ($segment == "Meditation") ? "Meditation" : (($segment == "LeisureRecreation") ? "Leisure & Recreation" : (($segment == "EcoTourism") ? "Eco Tourism" : (($segment == "AgroTourism") ? "Agro tourism" : (($segment == "WaterFalls") ? "Water Falls" : (($segment == "HistoricalArchaeology") ? "Historical & Archaeology" :
    "")))));
} else {
  $segment = "";
}

// show searched destinations
if (isset($_GET['keyword']) || isset($_GET['category']) || isset($_GET['segment']) || isset($_GET['district'])) {
  $destinations = showdestinations_bykeyword($keyword, $catname, $segname, $district);
} else {
  $destinations = showdestinations();
}

?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>All Tours</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="images/logo/logo_.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald:200,300,400,500,700%7CMontserrat:400,500,600">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<style>
    a.service-box-creative__media {
    border-radius: 20px;
}
</style>

<body>
  <?php include('preloader.php'); ?>
  <div class="page">
    <?php
    include('header.php');
    ?>

    <!-- Breadcrumbs-->
    <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(./images/home/new_bread.jpg);" data-preset='{"title":"Breadcrumbs","category":"header","reload":false,"id":"breadcrumbs"}'>
      <div class="container">
        <h4 class="breadcrumbs-custom-title">Destinations</h4>
        <ul class="breadcrumbs-custom-path">
          <li><a href="home.php">Home</a></li>
          <li class="active">Destinations</li>
        </ul>
      </div>
    </section>

    <!-- includes sticky.php -->
    <?php include('sticky.php'); ?>

    <!--Destinations-->
    <section class="section section-lg bg-default">
      <div class="container">
        <h2 class="text-center text-md-start">Explore Top Destination Around Western Province</h2>
        <div class="row row-40 offset-lg row-xl-40">


          <!-- filters  -->
          <div>
            <div class="gt-form container">
              <form method="get" action="tours.php">
                <div class="search-content">
                  <div class="gt-col">
                    <div class="gt-inner">
                      <input name="keyword" type="text" placeholder="e.g. Kelaniya, Kotahena" value="">
                    </div>
                  </div>

                  <div class="gt-col">
                    <div class="gt-inner">
                      <select name="district" class="gt-select" data-live-search="false" tabindex="-98">
                        <option value="">District</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Kaluthara">Kaluthara</option>
                        <option value="Gampaha">Gampaha</option>
                      </select>
                    </div>
                  </div>

                  <div class="gt-col">
                    <div class="gt-inner">
                      <select name="category" class="gt-select" data-live-search="false" tabindex="-98">
                        <option value="">Category</option>
                        <option value="1">Major</option>
                        <option value="2">heritage</option>
                        <option value="3">Environment</option>
                        <option value="4">Leisure & Recreation</option>
                        <option value="5">pristine</option>
                        <option value="6">thrills bliss scenic</option>
                        <option value="7">wild,thrills</option>
                        <option value="8">Multi Culturalism</option>
                        <option value="9">Art and Craft</option>
                        <option value="10">Mice</option>
                        <option value="11">Museum</option>
                        <option value="12">Colombo Life</option>
                        <option value="13">Sports</option>
                        <option value="14">Agro</option>
                        <option value="15">Religious</option>
                        <option value="16">Meditation</option>
                      </select>
                    </div>
                  </div>

                  <div class="gt-col">
                    <div class="gt-inner">
                      <select name="segment" class="gt-select" data-live-search="false" tabindex="-97">
                        <option value="">Segment</option>
                        <option value="Meditation">Meditation</option>
                        <option value="LeisureRecreation">Leisure & Recreation</option>
                        <option value="EcoTourism">Eco Tourism</option>
                        <option value="AgroTourism">Agro tourism</option>
                        <option value="WaterFalls">Water Falls</option>
                        <option value="HistoricalArchaeology">Historical & Archaeology</option>
                      
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



          <?php


          while ($row = mysqli_fetch_assoc($destinations)) {
            // echo  $row['dest_name'];

            echo "
      <div class='col-lg-4 col-md-6 wow fadeInUp' data-wow-delay='.9s'>
      <div class='service-box-creative zoom'><a class='service-box-creative__media' href='destination.php?destid=" . $row['id'] . "'><img style='border-radius: 0px 20px 0px 20px;' src='images/tour/" . $row['image_path'] . "' alt='' width='370' height='288' /></a>
        <div class='service-box-creative__caption'>
          <h5><a href='destination.php?destid=" . $row['id'] . "'>" . $row['dest_name'] . "</a></h5>
          <!-- <div class='price-group'><span class='price-group__sale'>$1500.00</span><span class='price-group__price-old'>$1655.00</span></div> -->
          <p class='shorttext'>" . $row['description'] . "</p>

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