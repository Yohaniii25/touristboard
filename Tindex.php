<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Western Province Tourist Board</title>

  <style>
    body, html {
  margin: 0;
  padding: 0;
  height: 100%;
  overflow: hidden;
}

.video-container {
  position: fixed;
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
}

  </style>
</head>
<body>
  <div class="video-container">
    <video autoplay muted id="fullscreen-video">
      <source src="new mob v2 cmbtour.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>

  <script>
    var video = document.getElementById("fullscreen-video");

    video.addEventListener("ended", function() {
      // Redirect to about.php after the video ends
      window.location.href = "https://touristboard.wp.gov.lk/home.php";
    });
  </script>
</body>
</html>
