<?php
include('includes/dbconfig.php');
include('includes/function.php');

$exp_id = $_GET['exp_id'];

$result = showsingleexperience($exp_id);

$map_result = null; // Initialize the variable outside the loop

// while using mysqli_fetch_assoc() function, we need to use a while loop to loop through the result set
while ($row = mysqli_fetch_assoc($result)) {
  $name = $row['exp_name'];
  $description = $row['exp_desc'];
  $image = $row['exp_image'];
  $exp_id = $row['exp_id'];
  $exp_category = $row['exp_category'];
  $exp_district = $row['exp_district'];
}

// show experiences by map
$map_result = showexperiences_bycat_map($exp_id);

?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Single Experience</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="images/logo/logo_.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald:200,300,400,500,700%7CMontserrat:400,500,600">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/style.css">


  <style>
    .your-div {
      position: relative;
    }

    .your-div::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url(images/tour/<?php echo "$image"; ?>);
      background-size: cover;
      opacity: 0.1;
      /* Adjust the opacity value as needed */
    }
  </style>
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
        <h4 class="breadcrumbs-custom-title"><?php echo $name; ?></h4>
        <ul class="breadcrumbs-custom-path">
          <li><a href="home.php">Home</a></li>
          <!--<li><a href="tours.html">Tours</a></li>-->
          <li class="active">Single Experience</li>
        </ul>
      </div>
    </section>

    <!-- includes sticky.php -->
    <?php include('sticky.php'); ?>

    <!--Tour Details-->
    <section class="section section-lg bg-default your-div">
      <div class="container">
        <h2 class="text-center text-md-start"><?php echo $name; ?></h2>
        <div class="row row-30 offset-lg">
          <div class="col-xl-5"><img style="border-radius: 0px 30px;" src="images/tour/<?php echo "$image"; ?>" alt="" width="470" height="464" />
          </div>
          <div class="col-xl-7">
            <div class="single-service__caption">
              <div class="heading-4 text-xl"><?php echo $name; ?></div>
              <div class="price-group"><span class="price-group__sale"><?php echo $exp_district; ?></span></div>
              <!-- <span class="price-group__price-old">$1925.00</span></div> -->
              <p style="text-align: justify" ;><?php echo $description; ?></p>
              <ul class="icon-list">
                <!-- <li><span class="icon mdi mdi-check"></span>Category: <?php echo $exp_category; ?></li> -->
                <!-- date -->
                <!-- <li><span class="icon mdi mdi-check"></span>Duration: 8 days</li> -->
                <!-- <li><span class=""></span><button class="review-button">Pay Now</button></li> -->

              </ul>
            </div>


          </div>
        </div>

        <br>

        <div>
          <!-- show map_iframe -->
          <h2 class="text-center text-md-start">Visit Us</h2><br>
          <div>
          <?php
                  if ($map_result) {
                  ?>
                    <iframe src="<?php echo $map_result; ?>" width="100%" height="450" style="border: 2px solid #c7bbbb; padding: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                  <?php
                  } else {
                    echo "No map available for this destination.";
                  }
                  ?>


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