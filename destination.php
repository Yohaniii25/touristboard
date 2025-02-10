<?php
include('includes/dbconfig.php');
include('includes/function.php');

$id_tour = $_GET['destid'];

$result = showsingledestination($id_tour);

$map_iframe_link = null; // Initialize the variable outside the loop

while ($row = mysqli_fetch_assoc($result)) {
  $name = $row['dest_name'];
  $desctription = $row['description'];
  $image = $row['image_path'];
  $destination_id = $row['id'];
}
// $path_bread = str_replace(' ', '%20', $image);
$map_iframe_link = showdestinations_bycat_map($id_tour);



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
h2, [class^='heading-'] {
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
    <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(images/tour/<?php echo "$image"; ?>);" data-preset='{"title":"Breadcrumbs","category":"header","reload":false,"id":"breadcrumbs"}'>
      <div class="container">
        <h4 class="breadcrumbs-custom-title"><?php echo $name; ?></h4>
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
        <h2 class="text-center text-md-start"><?php echo $name; ?></h2>
        <div class="row row-30 offset-lg">
          <div class="col-xl-5"><img style="border-radius: 0px 30px;" src="images/tour/<?php echo "$image"; ?>" alt="" width="470" height="464" />
          </div>
          <div class="col-xl-7">
            <div class="single-service__caption">
              <div class="heading-4 text-xl"><?php echo $name; ?></div>
              <!--<div class="price-group"><span class="price-group__sale">$1625.00</span><span class="price-group__price-old">$1925.00</span></div>-->
              <p><?php echo $desctription; ?></p>
              <ul class="icon-list">

              </ul>
            </div>
            <!-- single-destination.php -->

            <!-- single-destination.php -->
            <a class="review-button" href="review.php?destination=<?php echo $destination_id; ?>">Add a Review</a>
            <a style="background-color:brown;" class="review-button" href="hotels.php?dest_id=<?php echo $destination_id; ?>" onclick="bookHotel()">Book Nearby Hotel</a>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-11">
            <div class="tabs-custom tabs-corporate tab-style-1" id="tabs-1">
              <!--Nav tabs-->
              <ul class="nav nav-style-1 nav-custom">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-bs-toggle="tab"><span class="icon linearicons-menu"></span>Our Gallery</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-bs-toggle="tab"><span class="icon linearicons-plane"></span>Map</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-bs-toggle="tab"><span class="icon linearicons-picture3"></span>Videos</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-4" data-bs-toggle="tab"><span class="icon linearicons-user"></span>Reviews</a></li>
              </ul>
              <!--Tab panes-->
              <div class="tab-content">
                <div class="tab-pane fade active show" id="tabs-1-1">


                  <div class="row row-10 row-narrow-10 text-center" data-lightgallery="group">
                    <?php
                    include('includes/dbconfig.php');


                    $destination_id = $_GET['destid'];

                    $sql = "SELECT image_path FROM media WHERE destination_id = $destination_id";
                    $result = $mysqli->query($sql);

                    if ($result === false) {

                      echo "Error: " . $mysqli->error;
                    } elseif ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        $imagePaths = explode(',', $row['image_path']);


                        foreach ($imagePaths as $imagePath) {
                          echo '<div class="zoom col-lg-4 col-sm-6"><a class="gallery-link" href="images/gallery/' . trim($imagePath) . '" data-lightgallery="item">
                          <img style="border-radius: 0px 30px;" src="images/gallery/' . trim($imagePath) . '" alt="" width="370" height="250"/></a></div>';
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
                  if ($map_iframe_link) {
                  ?>
                    <iframe src="<?php echo $map_iframe_link; ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                  <?php
                  } else {
                    echo "No map available for this destination.";
                  }
                  ?>
                </div>
                <div class="tab-pane fade" id="tabs-1-3">


                  <iframe width="100%" height="450" src="https://www.youtube.com/embed/YOUR_YOUTUBE_VIDEO_ID" frameborder="0" allowfullscreen></iframe>
                </div>

                <div class="tab-pane fade" id="tabs-1-4">
                  <?php
                  //get submitted reviews
                  $query = "SELECT * FROM reviews WHERE dest_id = '$destination_id' AND approved = 1";
                  $result = mysqli_query($mysqli, $query);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo '<div class="card">';
                      echo '<div class="card-body">';
                      echo '<h5 class="card-title">' . htmlspecialchars($row['name']) . '</h5>';
                      echo '<ul class="list-unstyled">';
                      echo '<li>' . nl2br(htmlspecialchars($row['review'])) . '</li>'; // Use list items for each review
                      echo '</ul>';
                      echo '</div>';
                      echo '</div>';
                    }
                  } else {
                    echo 'No reviews found.';
                  }



                  ?>
                </div>

              </div>
            </div>
          </div>


        </div>

      </div>

      <!--view next 3 destinations-->
      <div class="container">
        <h2 class="text-center text-md-start">Related Destinations</h2>
        <div class="row row-30 offset-lg">
          <?php
          $sql = "SELECT * FROM destination WHERE id != $destination_id ORDER BY RAND() LIMIT 3";
          $result = $mysqli->query($sql);
          if ($result === false) {
            echo "Error: " . $mysqli->error;
          } elseif ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<div class='col-lg-4 col-md-6 wow fadeInUp' data-wow-delay='.1s'>";
              echo "<div class='service-box-creative'>";
              echo "<a class='service-box-creative__media' href='destination.php?destid=" . $row['id'] . "'style='position: relative; display: block;'>";
              echo "<img class='zoom' style='border-radius: 0px 30px 0px 30px;' src='images/tour/" . $row['image_path'] . "' alt='' width='370' height='284'>";
              // echo "<h5 class='tag-january' style='position: absolute; border-radius: 10px; bottom: 3px; left: 3px; background-color: #e1d723; padding: 5px; color: black;'>" . $row['dest_name'] . "</h5>";
              echo "</a>";
              echo "<div class='service-box-creative__caption'>";
              echo "<h5><a href='destination.php?destid=" . $row['id'] . "'>" . $row['dest_name'] . "</a></h5>";
              echo "<p class='shorttext'>" . $row['description'] . "</p>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
            }
          } else {
            echo "No destinations found.";
          }

          ?>
        </div>
      </div>

      <!-- includes pop-up.php -->
      <?php include('pop_up.php'); ?>
      

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