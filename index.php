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
    <video autoplay muted playsinline id="fullscreen-video">
      Your browser does not support the video tag.
    </video>
  </div>

  <script>
    var video = document.getElementById("fullscreen-video");

    if (window.innerWidth >= 768) {
      video.src = "new.mp4";
    } else {
      video.src = "new mob v2 cmbtour.mp4";
    }

    video.addEventListener("ended", function() {
      window.location.href = "home.php";
    });
  </script>
</body>
</html>
