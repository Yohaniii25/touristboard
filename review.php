<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Review</title>
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
  <div class="preloader">
    <div class="preloader-body">
      <div class="cssload-container">
        <div class="cssload-speeding-wheel"></div>
      </div>
      <p>Loading...</p>
    </div>
  </div>
  <div class="page">
    <?php

    include('header.php');

    ?>

    <!-- Breadcrumbs-->
    <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(./images/about/new_bread.jpg);" data-preset='{"title":"Breadcrumbs","category":"header","reload":false,"id":"breadcrumbs"}'>
      <div class="container">
        <h4 class="breadcrumbs-custom-title">Review</h4>
        <ul class="breadcrumbs-custom-path">
          <li><a href="home.php">Home</a></li>
          <li class="active">Submit your Review</li>
        </ul>
      </div>
    </section>

    <!-- review.php -->


    <section class="section section-md bg-default text-center" style="background-image:url(./images/review/3.jpg); background-size: cover; background-position: center center;">
      <div class="container">
        <h3>Add your Review</h3>
        <div class="row justify-content-md-center">
          <div class="col-md-9 col-lg-7 col-xl-5">
            <div class="review-box">
              <!-- RD Mailform -->
              <form class="rd-form" data-form-output="form-output-global" data-form-type="contact" method="post" action="submit_review.php">
                <div class="row row-sm-bottom row-30">
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <label class="form-label" for="name">Your Name</label>
                      <input class="form-input" id="name" type="text" name="name" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <label class="form-label" for="email">E-mail</label>
                      <input class="form-input" id="email" type="email" name="email" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap">
                      <label class="form-label" for="review">Your Review</label>
                      <textarea class="form-input" id="review" name="review" required></textarea>
                    </div>
                  </div>
                  <div class="col-12">
                    <input type="hidden" name="destination_id" value="<?php echo isset($_GET['destination']) ? htmlspecialchars($_GET['destination']) : ''; ?>">
                    <button class="button button-block button-primary" type="submit">Submit Your Review</button>
                  </div>
                </div>
              </form>
            </div> <!-- End of box -->
          </div>
        </div>
      </div>
    </section>



    <!--Footer-->
    <?php include('footer.php'); ?>
  </div>
  <div class="snackbars" id="form-output-global"></div>
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>