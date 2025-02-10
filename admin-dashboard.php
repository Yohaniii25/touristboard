<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Review Approval</title>
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
  h3 {
    color: #333;
    margin-top: 20px;
    margin-left: 20px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 30px;
  }

  th,
  td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
  }

  th {
    background-color: #f2f2f2;
  }

  td {
    background-color: #fff;
  }

  form {
    display: inline-block;
  }

  button {
    cursor: pointer;
    padding: 8px 14px;
    margin-right: 5px;
    border: none;
    color: #fff;
    background-color: #007bff;
    border-radius: 10px;
    margin-bottom: 10px;
  }

  button[name="delete"] {
    background-color: #dc3545;
  }
</style>



<body>
<?php include('preloader.php'); ?>
  <div class="page">
    <?php

    include('header.php');

    ?>

    <!-- Breadcrumbs-->
    <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(./images/home/img_3.jpg);" data-preset='{"title":"Breadcrumbs","category":"header","reload":false,"id":"breadcrumbs"}'>
      <div class="container">
        <h4 class="breadcrumbs-custom-title">Approve Review</h4>
        <ul class="breadcrumbs-custom-path">
          <li><a href="home.php">Home</a></li>
          <li class="active">Approve your Review</li>
        </ul>
      </div>
    </section>


    <?php
    include 'includes/dbconfig.php';

    // Check if the form is submitted 
    if (isset($_POST['approve'])) {
      $reviewId = $_POST['review_id'];
      $queryApprove = "UPDATE reviews SET approved = 1 WHERE id = $reviewId";
      mysqli_query($mysqli, $queryApprove);
    }

    if (isset($_POST['delete'])) {
      $reviewId = $_POST['review_id'];
      $queryDelete = "DELETE FROM reviews WHERE id = $reviewId";
      mysqli_query($mysqli, $queryDelete);
    }

    // Fetch unapproved reviews
    $queryUnapproved = "SELECT * FROM reviews WHERE approved = 0";
    $unapprovedReviews = mysqli_query($mysqli, $queryUnapproved);

    // Display unapproved reviews 
    if ($unapprovedReviews->num_rows > 0) {
      echo '<h3>Unapproved Reviews</h3>';

      echo '<table border="1">';
      echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Review</th><th>Action</th></tr>';

      while ($row = $unapprovedReviews->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
        echo '<td>' . nl2br(htmlspecialchars($row['review'])) . '</td>';
        echo '<td>';
        echo '<form method="post" action="">';
        echo '<input type="hidden" name="review_id" value="' . $row['id'] . '">';
        echo '<button type="submit" name="approve">Approve</button>';
        echo '<button type="submit" name="delete">Delete</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
      }

      echo '</table>';
    } else {
      echo '<h6>' . 'No unapproved reviews found.' . '</h6>';
    }

    // Fetch and display approved reviews
    $queryApproved = "SELECT * FROM reviews WHERE approved = 1";
    $approvedReviews = mysqli_query($mysqli, $queryApproved);

    if ($approvedReviews->num_rows > 0) {
      echo '<h3>Approved Reviews</h3>';
      echo '<table border="1">';
      echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Review</th></tr>';

      while ($rowApproved = $approvedReviews->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $rowApproved['id'] . '</td>';
        echo '<td>' . htmlspecialchars($rowApproved['name']) . '</td>';
        echo '<td>' . htmlspecialchars($rowApproved['email']) . '</td>';
        echo '<td>' . nl2br(htmlspecialchars($rowApproved['review'])) . '</td>';
        echo '</tr>';
      }

      echo '</table>';
    } else {
      echo 'No approved reviews found.';
    }

    ?>

  </div>
  <!--Footer-->
  <?php
  include('footer.php'); ?>
  </div>

  <div class="snackbars" id="form-output-global"></div>
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>