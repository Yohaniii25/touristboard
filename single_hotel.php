<?php
include('includes/dbconfig.php');
include('includes/function.php');

$hotel_id = $_GET['hotel_id'];

$result = showsinglehotel($hotel_id);

$map_iframe_hotel = null; // Initialize the variable outside the loop

while ($row = mysqli_fetch_assoc($result)) {
  $hotel_name = $row['hotel_name'];
  $hotel_image = $row['hotel_image'];

  $hotel_id = $row['hotel_id'];
  $hotel_number = $row['hotel_contact_number'];
  $hotel_url = $row['hotel_url'];
}
// $path_bread = str_replace(' ', '%20', $image);
$map_iframe_hotel = showhotel_map($hotel_id);



?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Single Tour</title>
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
  <link href="https://fonts.googleapis.com/css2?family=Protest+Revolution&family=Quintessential&display=swap" rel="stylesheet">

  <style>
    h2,
    h4,
    h6,
    [class^='heading-'] {
      font-family: "Quintessential", serif;
      font-weight: 600;
      text-transform: capitalize;

    }
  </style>

<body>
  <?php include('preloader.php'); ?>
  <div class="page">

    <?php
    include('header.php');
    ?>
    <!-- Breadcrumbs-->
    <!--<section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(images/hotels/<?php echo "$hotel_image"; ?>);" data-preset='{"title":"Breadcrumbs","category":"header","reload":false,"id":"breadcrumbs"}'>-->
      <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(images/hotels/sample1.jpg);" data-preset='{"title":"Breadcrumbs","category":"header","reload":false,"id":"breadcrumbs"}'>
      
      <div class="container">
        <h4 class="breadcrumbs-custom-title"><?php echo $hotel_name; ?></h4>
        <ul class="breadcrumbs-custom-path">
          <li><a href="home.php">Home</a></li>
          <!--<li><a href="tours.html">Tours</a></li>-->
          <li class="active">Destinations</li>
        </ul>
      </div>
    </section>

    <!-- includes sticky.php -->
    <?php include('sticky.php'); ?>

    <!--Tour Details-->
    <section class="section section-lg bg-default">
      <div class="container">
        <h2 class="text-center text-md-start"><?php echo $hotel_name; ?></h2>
        <div class="row row-30 offset-lg">
          <div class="col-xl-5">
              <!--<img style="border-radius: 0px 30px;" src="images/hotels/<?php echo "$hotel_image"; ?>" alt="" width="470" height="464" />-->
              <img style="border-radius: 0px 30px;" src="images/hotels/sample1.jpg" alt="" width="470" height="464" />
          </div>
          <div class="col-xl-7">
            <div class="single-service__caption">

              <!--<div class="price-group"><span class="price-group__sale">$1625.00</span><span class="price-group__price-old">$1925.00</span></div>-->
            
              <h6>Contact Number : <?php echo $hotel_number ?></h6><br>
              <h6>
                
                <a href="<?php echo $hotel_url; ?>" target="_blank" class="button button-primary button-round-1">Discover More</a>
             
              </h6>

              <ul class="icon-list">

              </ul>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-11">
            <div class="tabs-custom tabs-corporate tab-style-1" id="tabs-1">
              <!--Nav tabs-->
              <ul class="nav nav-style-1 nav-custom">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-bs-toggle="tab"><span class="icon linearicons-menu"></span>Our Gallery</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-bs-toggle="tab"><span class="icon linearicons-plane"></span>Map</a></li>
              </ul>
              <!--Tab panes-->
              <div class="tab-content">
                <div class="tab-pane fade active show" id="tabs-1-1">


                  <div class="row row-10 row-narrow-10 text-center" data-lightgallery="group">
                    <?php
                    include('includes/dbconfig.php');


                    $hotel_id = $_GET['hotel_id'];

                    $sql = "SELECT image_path FROM single_hotel_media WHERE hotel_id = $hotel_id";
                    $result = $mysqli->query($sql);

                    if ($result === false) {

                      echo "Error: " . $mysqli->error;
                    } elseif ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        $imagePaths = explode(',', $row['image_path']);


                        foreach ($imagePaths as $imagePath) {
                          echo '<div class="zoom col-lg-4 col-sm-6"><a class="gallery-link" href="images/hotel_gallery/' . trim($imagePath) . '" data-lightgallery="item">
                          <img style="border-radius: 0px 30px;" src="images/hotel_gallery/' . trim($imagePath) . '" alt="" width="370" height="250"/></a></div>';
                        }
                      }
                    } else {
                      echo "No images found for this tour.";
                    }



                    ?>
                  </div>


                </div>
                <div class="tab-pane fade" id="tabs-1-2">
                  <?php
                  if ($map_iframe_hotel) {
                  ?>
                    <iframe src="<?php echo $map_iframe_hotel; ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                  <?php
                  } else {
                    echo "No map available for this hotel.";
                  }
                  ?>
                </div>

              </div>
            </div>
          </div>


        </div>

        <!-- reservation form -->
        <div class="row">
          <div class="col-xl-12">
            <h4 class="text-center text-md-start">Make a Reservation</h4>
            <!-- form for make a reservation -->
            <div class="row justify-content-md-center">
              <div class="col-md-12">
                <div class="review-box">
                  <!-- RD Mailform -->
                  <?php include 'booking.php' ?>
                </div> <!-- End of box -->
              </div>
            </div>

          </div>
        </div>


      </div>

      <br>
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