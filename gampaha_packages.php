<?php

include('includes/function.php');

// show all experiences
$gampaha_experiences = showgampahaexperiences();
$gampaha_experiences_pilikuththuwa = showgampahaexperiences_pilikuththuwa();
$gampaha_experiences_catamaran = showgampahaexperiences_catamaran();
$gampaha_experiences_kelaniganthota = showgampahaexperiences_kelaniganthota();



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
</head>

<style>
  img {
    border-radius: 30px 0px;
  }

  .card-corporate .card-title a, .card-corporate {

    background: linear-gradient(133deg, #abdbf1, #fdfdfd) !important;
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
        <h4 class="breadcrumbs-custom-title">Experiences</h4>
        <ul class="breadcrumbs-custom-path">
          <li><a href="home.php">Home</a></li>
          <li class="active">Gampaha Experiences</li>
        </ul>
      </div>
    </section>

    <!-- includes sticky.php -->
    <?php include('sticky.php'); ?>

    <!--Experiences-->
    <section class="section section-lg bg-default">
      <div class="container">
        <h2 class="text-center text-md-start">Explore Top Destination Around Gampaha</h2>
        <div class="row row-40 offset-lg row-xl-40">


          <section class="section section-md bg-default text-center">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-12">
                  <!--Bootstrap collapse-->
                  <div class="card-group-custom card-group-corporate" id="accordion1" role="tablist" aria-multiselectable="false">
                    <!--Bootstrap card-->
                    <article class="card card-custom card-corporate">
                      <div class="card-header" role="tab">
                        <div class="card-title">
                          <a id="accordion1-card-head-xxtgcvny" data-bs-toggle="collapse" data-bs-parent="#accordion1" href="#accordion1-card-body-lrdexjyp" aria-controls="accordion1-card-body-lrdexjyp" aria-expanded="true" role="button">
                          Pilikuththuwa Tourism
                            <div class="card-arrow"></div>
                          </a>
                        </div>
                      </div>
                      <div class="collapse show" id="accordion1-card-body-lrdexjyp" aria-labelledby="accordion1-card-head-xxtgcvny" data-bs-parent="#accordion1" role="tabpanel">
                        <div class="card-body">
                          <!-- display experiences of category Seethawaka as three columns -->
                          <div class="row">
                            <?php
                            while ($row = mysqli_fetch_assoc($gampaha_experiences_pilikuththuwa)) {
                              echo "
                                                            <div class='col-lg-4 col-md-6 mb-4'>
                                                            <div class='service-box-creative'>
                                                            <a class='service-box-creative__media zoom' href='single_package.php?exp_id=" . $row['exp_id'] . "' style='position: relative; display: block;'>
                                                            <img src='images/tour/" . $row['exp_image'] . "' alt='' width='370' height='284'>
                                                            
                                                            </a>
                                                            <div class='service-box-creative__caption'>
                                                            <h5><a href='single_package.php?exp_id=" . $row['exp_id'] . "'>" . $row['exp_name'] . "</a></h5>
                                                            <p class='shorttext'>" . $row['exp_desc'] . "</p>
                                                            </div>
                                                            </div>
                                                            </div>";
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                    </article>
                    <!--Bootstrap card-->
                    <article class="card card-custom card-corporate">
                      <div class="card-header" role="tab">
                        <div class="card-title"><a class="collapsed" id="accordion1-card-head-eoubxcjv" data-bs-toggle="collapse" data-bs-parent="#accordion1" href="#accordion1-card-body-cjtxsisg" aria-controls="accordion1-card-body-cjtxsisg" aria-expanded="false" role="button">Catamaran Tourism
                            <div class="card-arrow">
                            </div>
                          </a></div>
                      </div>
                      <div class="collapse" id="accordion1-card-body-cjtxsisg" aria-labelledby="accordion1-card-head-eoubxcjv" data-bs-parent="#accordion1" role="tabpanel">
                        <div class="card-body">
                          <div class="row">
                            <?php
                            while ($row = mysqli_fetch_assoc($gampaha_experiences_catamaran)) {
                              echo "
                                                            <div class='col-lg-4 col-md-6 mb-4'>
                                                            <div class='service-box-creative'>
                                                            <a class='service-box-creative__media zoom' href='single_package.php?exp_id=" . $row['exp_id'] . "' style='position: relative; display: block;'>
                                                            <img src='images/tour/" . $row['exp_image'] . "' alt='' width='370' height='284'>
                                                            
                                                            </a>
                                                            <div class='service-box-creative__caption'>
                                                            <h5><a href='single_package.php?exp_id=" . $row['exp_id'] . "'>" . $row['exp_name'] . "</a></h5>
                                                            <p class='shorttext'>" . $row['exp_desc'] . "</p>
                                                            </div>
                                                            </div>
                                                            </div>";
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                    </article>
                    <!--Bootstrap card-->
                    <article class="card card-custom card-corporate">
                      <div class="card-header" role="tab">
                        <div class="card-title"><a class="collapsed" id="accordion1-card-head-ufmayvae" data-bs-toggle="collapse" data-bs-parent="#accordion1" href="#accordion1-card-body-bvlwjyvx" aria-controls="accordion1-card-body-bvlwjyvx" aria-expanded="false" role="button">Kelaniganthota Tourism
                            <div class="card-arrow"></div>
                          </a></div>
                      </div>
                      <div class="collapse" id="accordion1-card-body-bvlwjyvx" aria-labelledby="accordion1-card-head-ufmayvae" data-bs-parent="#accordion1" role="tabpanel">
                        <div class="card-body">
                          <div class="row">
                            <?php
                            while ($row = mysqli_fetch_assoc($gampaha_experiences_kelaniganthota)) {
                              echo "
                                                            <div class='col-lg-4 col-md-6 mb-4'>
                                                            <div class='service-box-creative'>
                                                            <a class='service-box-creative__media zoom' href='single_package.php?exp_id=" . $row['exp_id'] . "' style='position: relative; display: block;'>
                                                            <img src='images/tour/" . $row['exp_image'] . "' alt='' width='370' height='284'>
                                                            
                                                            </a>
                                                            <div class='service-box-creative__caption'>
                                                            <h5><a href='single_package.php?exp_id=" . $row['exp_id'] . "'>" . $row['exp_name'] . "</a></h5>
                                                            <p class='shorttext'>" . $row['exp_desc'] . "</p>
                                                            </div>
                                                            </div>
                                                            </div>";
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
            </div>
          </section>





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