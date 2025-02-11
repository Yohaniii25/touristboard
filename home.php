<?php

include "includes/function.php";

$rand_dest = rand_destinations();
?>
<!DOCTYPE html>

<html class="wide wow-animation" lang="en">



<head>

  <title>Home</title>

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



<style>
  img {
    border-radius: 30px;
  }

  .video-container {
    position: relative;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;

  }

  #fullscreen-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    /*margin-top: 10px;*/

  }

  @media (min-width: 1200px) {
    .intro-box__floating-text {
      font-size: 20px;
      top: 90%;
      text-align: left;
    }

  }

  .intro-box__floating-text {

    position: absolute;
    top: 90%;
    left: 18%;
    transform: translateX(-50%);
    font-size: 30px;
    user-select: none;
    font-weight: 100;

  }

  .quote-classic-wrap .heading-4 {
    font-weight: 400;
    font-size: 22px;
    letter-spacing: 0.2px;
  }

  @media (max-width: 767px) {
    .hidemobile {
      display: none;
    }
  }


  /* Popup background */
  .popup-container {
    display: flex;
    /* Show popup on page load */
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    /* Dark overlay */
    z-index: 1000;
  }

  /* Popup box */
  .popup-box {
    position: relative;
    background: white;
    padding: 100px;
    width: 700px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    background-image: url('./images/home/LK94909139-11-E-ezgif.com-webp-to-jpg-converter\ \(1\).jpg');
    
    background-size: cover;
    background-position: center;
    color: white;
    background-blur: 10px;
    
  }

  /* Close button */
  .close-btn {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    cursor: pointer;
    background: red;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 50%;
  }

  .popup-box h2 {
    font-size: 32px;
    line-height: 1.5;
    margin-bottom: 15px;
    -webkit-text-stroke: 2px rgb(173, 134, 5);
    text-decoration: none;
    font-weight: bold;
    color: black;
  }

  .popup-box h2 span {
    display: block;
    /* Make the text appear on two lines */
  }

  /* Button styles */
  .watch-btn {
    background: #ffcc00;
    color: #000;
    padding: 10px 15px;
    text-decoration: none;
    display: inline-block;
    margin-top: 10px;
    border-radius: 5px;
    font-weight: bold;
  }
</style>


<body>

  <!-- includes preloader -->

  <?php include "preloader.php"; ?>


  <div class="page">

    <?php include "header.php"; ?>

    <!-- includes booking_sticky.php -->
    <?php include "booking_sticky.php"; ?>


    <!-- includes sticky.php -->

    <?php include "sticky.php"; ?>







    <!------------------------------ video slider ------>

    <div class="video-container">

      <video autoplay muted id="fullscreen-video">

        <source src="2024.05.13 Slider (1).mp4" type="video/mp4">

        Your browser does not support the video tag.

      </video>



      <div style="font-family: 'Oleo Script', system-ui;" class="intro-box__floating-text">
        Paradise Within Paradise
      </div>



      <!------------------------------ video slider ------>

      <!--Way to Travel-->

      <section class="section section-custom-1 bg-image-1">

        <div class="container">

          <div class="row row-30">

            <div class="col-xl-5 position-relative">

              <h2 style="font-weight: bold; font-family: 'Quintessential', serif; text-transform: capitalize;"><span class="wow fadeInLeft d-xl-block">Exploring Our Tapestry of Excellence</span></h2>

              <p style="text-align:justify;" class="wow fadeInLeft offset-xl" data-wow-delay=".3s">Discover the Western Province of Sri Lanka, a hub of history from the ancient city of Kotte to colonial struggles. Witness the rise and fall of capitals like Kotte and Colombo, reflecting shifts in power. Delve into the Dutch era marked by the Kandyan Treaty of 1638, offering protection against Portuguese dominance. </p>

              <p style="text-align:justify;" class="wow fadeInLeft" data-wow-delay=".4s">British colonial rule until 1948 left a lasting imprint, shaping the province's culture and economy. Explore our Coffee Table Book to uncover the province's rich heritage and iconic landmarks, bridging the past with the vibrant present.</p>

              <div class="offset-top-25 wow fadeInUp" data-wow-delay=".5s"><img src="images/signature-1-113x66.png" alt="" width="113" height="66" />

              </div>

            </div>

            <div class="col-xl-7 position-relative">

              <div class="image-box inset-xl-1 wow fadeInUp">

                <div class="image-box__static"><img src="images/home/kandydancer.jpg" alt="" width="364" height="459" />

                </div>

                <div class="image-box__float"><img src="images/home/nelum.jpg" alt="" width="364" height="459" />

                </div>

              </div>

            </div>

          </div>

        </div>

      </section>


      <!-- Popup (visible on page load) -->
      <div id="popup" class="popup-container">
        <div class="popup-box">
          <button class="close-btn" onclick="closePopup()">X</button>
          <h2>
            <span>Gangarama Temple</span>
            Nawam Maha Perahera 2025
          </h2>

          <a href="gangarama-live.php" class="watch-btn">Watch Live</a>
        </div>
      </div>

      <script>
        function closePopup() {
          document.getElementById("popup").style.display = "none";
        }
      </script>

      <!--Call to action creative-->

      <section class="section bg-image-2 section-lg">

        <div class="container">

          <div class="row row-30 flex-column-reverse flex-lg-row">

            <div class="col-lg-4 d-flex flex-column fadeInLeft z-index align-items-center">

              <a class="floating-video-box" href="./videos/09_FINAL_EDIT_FINAL (1).mp4">

                <img src="./videos/Untitled-2.jpg" alt="" width="370" height="288" />

                <span class="icon fa fa-play"></span></a>

            </div>

            <div style="padding-bottom: 120px;" class="col-lg-8 column-bg-1">

              <div style="background-color: #fff; padding-top: 30px;" class="quote-classic-wrap">

                <div class="heading-4 wow fadeInUp">Providing a standardized sustainable tourism service through providing technical and educational services, training, physical facilities and promotion activities for local and foreign tourists in the tourism industry</div>

                <p class="fst-italicwow fadeInUp" data-wow-delay=".2s">Our Mission</p>

              </div>

            </div>

          </div>

        </div>

      </section>

      <!--carosoul-->
      <section class="section section-md bg-default hidemobile">

        <div class="">

          <div class="row">

            <h2 style="font-weight: bold; font-family: 'Quintessential', serif; text-transform: capitalize; text-align: center !important;padding-bottom:20px"><a href="tours.php">Trending Tourist Destinations</a></h2>
            <p></p>

            <?php while ($row = mysqli_fetch_assoc($rand_dest)) {
              // echo $row['dest_name'];
              echo '
                      <div class="col-3">
                                    <a class="info-box-classic" href="destination.php?destid=' .
                $row["id"] .
                '" contenteditable="false" style="cursor: pointer;">

                                <img src="images/tour/' .
                $row["image_path"] .
                '" alt="" width="370" height="240">

                                <div class="info-box-classic__description">

                                  <div class="heading-4">' .
                $row["dest_name"] .
                '</div>

                                </div>

                              </a>
                      </div>
                      ';
            } ?>



          </div>

        </div>
      </section><br>


      <!--carosoul-->

      <!--Advantages-->

      <section class="section section-md bg-default">

        <div class="container">

          <div class="row">

            <h2 style="font-weight: bold; font-family: 'Quintessential', serif; text-transform: capitalize; text-align: center !important;"><a href="tours.php">Western Province : A journey through time and Heritage</a></h2>

            <p style="text-align: center !important;" class="offset-xl">Welcome to the Western Province of Sri Lanka, where the vibrant essence of the island nation comes to life. With its captivating mix of urban sophistication and natural wonders, the Western Province beckons travelers to explore its diverse landscapes and rich cultural heritage.</p>



          </div>

        </div>

      </section>

      <!--Tours-->

      <section class="section section-lg bg-image-3">

        <div class="creative-bg">

          <div class="container">

            <div class="row row-30 justify-content-center" data-lightgallery="group">



              <div class="d-flex col-sm-6 col-lg-4 ordex-xl-1 order-1 wow fadeInLeft">

                <div class="row row-30">

                  <div class="col-lg-12 col-sm-6 wow fadeInUp" data-wow-delay=".2s">

                    <a class="info-box-classic" href="tours.php?keyword=&category=&segment=Meditation">

                      <img src="images/home/med.jpg" alt="" width="370" height="240" />

                      <div class="info-box-classic__description">

                        <div class="heading-4">MEDITATION</div>

                      </div>

                    </a>

                  </div>

                  <div class="col-lg-12 col-sm-6 wow fadeInUp" data-wow-delay=".3s">

                    <a class="info-box-classic" href="tours.php?keyword=&category=&segment=EcoTourism">

                      <img src="images/gallery/sinharaja2.jpg" alt="" width="370" height="240" />

                      <div class="info-box-classic__description">

                        <div class="heading-4">ECO TOURISM</div>

                      </div>

                    </a>

                  </div>

                </div>

              </div>

              <div class="col-sm-12 col-lg-4 order-3 order-xl-2">

                <div class="row row-30">

                  <div class="col-lg-12 col-sm-6 wow fadeInUp" data-wow-delay=".2s">

                    <a class="info-box-classic" href="tours.php?keyword=&category=&segment=AgroTourism">

                      <img src="images/home/agri.jpg" alt="" width="370" height="240" />

                      <div class="info-box-classic__description">

                        <div class="heading-4">AGRO TOURISM</div>

                      </div>

                    </a>

                  </div>

                  <div class="col-lg-12 col-sm-6 wow fadeInUp" data-wow-delay=".3s">

                    <a class="info-box-classic" href="tours.php?keyword=&category=&segment=LeisureRecreation">

                      <img src="images/home/leisure.jpg" alt="" width="370" height="240" />

                      <div class="info-box-classic__description">

                        <div class="heading-4">LEISURE & RECREATION</div>

                      </div>

                    </a>

                  </div>

                </div>

              </div>

              <div class="d-flex col-sm-6 col-lg-4 ordex-xl-3 order-md-2 wow fadeInRight" data-wow-delay=".4s">

                <div class="row row-30">

                  <div class="col-lg-12 col-sm-6 wow fadeInUp" data-wow-delay=".2s">

                    <a class="info-box-classic" href="tours.php?keyword=&category=&segment=WaterFalls">

                      <img src="images/home/water.jpg" alt="" width="370" height="240" />

                      <div class="info-box-classic__description">

                        <div class="heading-4">WATER FALLS</div>

                      </div>

                    </a>

                  </div>

                  <div class="col-lg-12 col-sm-6 wow fadeInUp" data-wow-delay=".3s">

                    <a class="info-box-classic" href="tours.php?keyword=&category=&segment=HistoricalArchaeology">

                      <img src="images/home/historical.jpg" alt="" width="370" height="240" />

                      <div class="info-box-classic__description">

                        <div class="heading-4">HISTORY AND ARCHAEOLOGY</div>

                      </div>

                    </a>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

      </section>

      <!--Info Section-->

      <section class="section section-md bg-default">

        <div class="container">

          <h2 style="font-weight: bold; font-family: 'Quintessential', serif; text-transform: capitalize;">Welcome To Western Province </h2>

          <div class="row row-40 offset-lg">

            <div class="col-xl-6 wow fadeInLeft">

              <p>Dive into the multifaceted wonder of Sri Lanka, the Pearl of the Indian Ocean. From sun-kissed beaches and verdant rainforests to captivating culture and cosmopolitan cityscapes, this island paradise offers a spectrum of experiences. Explore ancient ruins, indulge in world-class shopping, savor delectable cuisine, and pulsate to vibrant nightlife in Colombo, Gampaha, or Kaluthara. Discover your Sri Lankan adventure awaits!</p>

            </div>

            <div class="col-xl-3 col-sm-6 wow fadeInUp">

              <ul class="list-marked">

                <li>Community Empowerment</li>

                <li>Historical Tours</li>

                <li>Cultural Experiences</li>

                <li>Heritage Sites</li>

                <!-- <li>Handpicked hotels</li> -->

              </ul>

            </div>

            <div class="col-xl-3 col-sm-6 wow fadeInUp">

              <ul class="list-marked">

                <li>Nature and Wildlife</li>

                <li>Culinary Tours</li>

                <li>Community Engagement</li>

                <li>Adventure Activities</li>

                <!-- <li>Visas</li> -->

              </ul>

            </div>

          </div>

        </div>

      </section>

      <section class="section section-lg bg-image-4">

        <div class="container">

          <div class="row justify-content-xl-end">

            <div class="col-xl-9 column-bg-2">

              <div class="quote-classic-wrap">

                <div class="heading-4 wow fadeInUp">Transforming Western Province into the Most Attractive Destination"</div>

                <p style="color: #6c6c6c;" class="fst-italicwow fadeInUp" data-wow-delay=".2s">Our Vision</p>

              </div>

            </div>

          </div>

        </div>

      </section>

      <!--Blog Post-->

      <section class="section section-lg">
        <div class="container">
          <!-- Section Title -->


          <div class="row">
            <!-- Blog Posts Column (2/3 Width) -->
            <div class="col-lg-8">
              <h2 style="font-weight: bold; font-family: 'Quintessential', serif; text-transform: capitalize;">Our Blog Posts</h2>

              <div class="row row-30">
                <!-- Blog Post 1 -->
                <div class="col-md-6">
                  <div class="post-classic">
                    <a class="post-classic__media" href="#"><img src="images/home/bakers fall.png" width="370" height="264" alt="Bakers Fall" /></a>
                    <div class="post-classic-caption">
                      <span>January 1, 2022</span>
                      <h5><a href="#">5 Places to Visit This Winter</a></h5>
                      <p>New Year and Christmas holidays is a great occasion to travel somewhere. You can either go somewhere with your family, friends, or even alone...</p>
                    </div>
                  </div>
                </div>

                <!-- Blog Post 2 -->
                <div class="col-md-6">
                  <div class="post-classic">
                    <a class="post-classic__media" href="#"><img src="images/home/union place.png" width="370" height="264" alt="Union Place" /></a>
                    <div class="post-classic-caption">
                      <span>January 1, 2022</span>
                      <h5><a href="#">Budget Trips for Winter Break</a></h5>
                      <p>Budget trip doesn’t mean boring! There are numerous places worth visiting even if you don’t have much money. The golden sands of Florida and California...</p>
                    </div>
                  </div>
                </div>

                <!-- Blog Post 3 -->

              </div>
            </div>

            <!-- Video Column (1/3 Width) -->
            <div class="col-lg-4">
              <h2 style="font-weight: bold; font-family: 'Quintessential', serif; text-transform: capitalize;">Our Videos</h2>
              <div class="row row-30">
                <!-- YouTube Video Embed -->
                <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; background-color: #f7f7f7; margin-bottom: 20px;">
                  <iframe src="https://www.youtube.com/embed/SK0rmV8VPoU"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
                </div>

                <!-- Second Video Embed -->
                <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; background-color: #f7f7f7;">
                  <iframe src="https://www.youtube.com/embed/Q-MGWwvXUsQ"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
                </div>
              </div>


            </div>
          </div>
        </div>
      </section>

      <!--Footer-->
      <div class="weather">
        <a class="weatherwidget-io" href="https://forecast7.com/en/6d9379d86/colombo/" data-label_1="Colombo" data-label_2="Gampaha | Kalutara" data-theme="original">Colombo Gampaha | Kalutara</a>
        <script>
          ! function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (!d.getElementById(id)) {
              js = d.createElement(s);
              js.id = id;
              js.src = 'https://weatherwidget.io/js/widget.min.js';
              fjs.parentNode.insertBefore(js, fjs);
            }
          }(document, 'script', 'weatherwidget-io-js');
        </script>

      </div>

      <?php include "footer.php"; ?>

    </div>

    <div class="snackbars" id="form-output-global"></div>

    <script src="js/core.min.js"></script>

    <script src="js/script.js"></script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {

        var video = document.getElementById('fullscreen-video');



        // Event listener for the video's 'ended' event

        video.addEventListener('ended', function() {

          // Reset the video to the beginning and play it again

          video.currentTime = 0;

          video.play();

        });

      });
    </script>







</body>



</html>