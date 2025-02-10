<?php

include('includes/function.php');

$events = showevents();

//get search events by keyword
if (isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];
} else {
  $keyword = "";
}

//get search events by event_month
if (isset($_GET['event_month'])) {

  $event_month = $_GET['event_month'];

  $monthname = ($event_month == 1) ? "January" : (($event_month == 2) ? "February" : (($event_month == 3) ? "March" : (($event_month == 4) ? "April" : (($event_month == 5) ? "May" : (($event_month == 6) ? "June" : (($event_month == 7) ? "July" : (($event_month == 8) ? "August" : (($event_month == 9) ? "September" : (($event_month == 10) ? "October" : (($event_month == 11) ? "November" : (($event_month == 12) ? "December" :
                          "")))))))))));
} else {
  $monthname = "";
}

//get search events by event_district
if (isset($_GET['event_district'])) {

  $event_district = $_GET['event_district'];

  $districtname = ($event_district == 55) ? "Colombo" : (($event_district == 56) ? "Kalutara" : (($event_district == 57) ? "Gampaha" :
        ""));
} else {
  $districtname = "";
}

//show searched events
if (isset($_GET['keyword']) || isset($_GET['event_month']) || isset($_GET['event_district'])) {
  $events = showevents_bykeyword($keyword, $monthname, $districtname);
} else {
  $events = showevents();
}

?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Events</title>
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

  <?php

  include('header.php');

  ?>

  <!-- Breadcrumbs-->
  <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(./images/home/new_bread.jpg);" data-preset='{"title":"Breadcrumbs","category":"header","reload":false,"id":"breadcrumbs"}'>
    <div class="container">
      <h4 class="breadcrumbs-custom-title">Our Events</h4>
      <ul class="breadcrumbs-custom-path">
        <li><a href="home.php">Home</a></li>
        <li class="active">Events</li>
      </ul>
    </div>
  </section>


  <!-- includes sticky.php -->
  <?php include('sticky.php'); ?>

  <!--Destinations-->
  <section class="section section-lg bg-default">
    <div class="container">
      <h2 style="font-weight: bold; font-family: 'Quintessential', serif; text-transform: capitalize;" class="text-center text-md-start">Tradition Unleashed, Moments Created</h2>

      <!-- filter -->
      <div class="gt-form container">
        <form method="get" action="events.php">
          <div class="search-content">
            <div class="gt-col">
              <div class="gt-inner">
                <input name="keyword" type="text" placeholder="e.g. Kelaniya, Kotahena" value="">
              </div>
            </div>
            <div class="gt-col">
              <div class="gt-inner">
                <select name="event_month" class="gt-select" data-live-search="false" tabindex="-98">
                  <option value="">Month</option>
                  <option value="1">January</option>
                  <option value="2">February</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
              </div>
            </div>
            <div class="gt-col">
              <div class="gt-inner">
                <select name="event_district" class="gt-select" data-live-search="false" tabindex="-98">
                  <option value="">District</option>
                  <option value="55">Colombo</option>
                  <option value="56">Kalutara</option>
                  <option value="57">Gampaha</option>
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
      <!-- filter -->
      <div class="row row-40 offset-lg row-xl-40">

        <?php
        while ($row = mysqli_fetch_assoc($events)) {

          echo "
        <div class='col-lg-4 col-md-6 wow fadeInUp' data-wow-delay='.1s'>
        <div class='service-box-creative'>
        <a class='service-box-creative__media' href='events.php?eventid=" . $row['eventid'] . "' style='position: relative; display: block;'>
            <img style='border-radius: 20px 0px 20px 0px;' class='zoom' src='images/events/" . $row['event_img_path'] . "' alt='' width='370' height='284'>
            <h5 class='tag-january' style='position: absolute; border-radius: 10px; bottom: 3px; left: 3px; background-color: #e1d723; padding: 5px; color: black;'>" . $row['event_month'] . "</h5>
        </a>
        <div class='service-box-creative__caption'>
            <h5><a href='single-tour.html'>" . $row['event_name'] . "</a></h5>
            <div class='price-group'>
                <span class='price-group__sale'>" . $row['event_district'] . "</span>
                <span class='price-group__sale'> | " . $row['event_location'] . "</span>
            </div>
            <p>" . $row['event_desc'] . "</p>
            <!-- <ul class='icon-list'>
    <li><span class='icon linearicons-platter'></span><span>Meal</span></li>
    <li><span class='icon linearicons-clock3'></span><span>5 Days</span></li>
    <li><span class='icon linearicons-plane'></span><span>Flight</span></li>
</ul> -->
        </div>
    </div>

        
        </div>
        ";
        }
        ?>




      </div>
    </div>
  </section>

  <!--Footer-->
  <?php
  include('footer.php'); ?>
  </div>

  <div class="snackbars" id="form-output-global"></div>
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>