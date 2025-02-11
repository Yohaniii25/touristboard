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
    <style>
        /* Simple styling for the live stream */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        /* Stream Container with Background Image and Centering */
        .stream-container {
            position: relative;
            /* Set relative positioning to allow the overlay */
            margin: 12px;
            /* Set margin around the container */
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            max-width: 80%;
            /* Limit width to 80% of the page */
            margin-left: auto;
            margin-right: auto;
            /* Center the container */
            background-image: url('./images/home/LK94909139-11-E-ezgif.com-webp-to-jpg-converter\ \(1\).jpg');
            /* Background image */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .stream-container::before {
            content: '';
            /* Create an empty element */
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.5);
            /* White overlay with opacity */
            border-radius: 10px;
            /* Match the container's border radius */
            z-index: 1;
            /* Position the overlay behind the content */
        }

        .stream-container h1,
        .stream-container iframe,
        .stream-container .info-box {
            position: relative;
            /* Keep content above the overlay */
            z-index: 2;
            /* Ensure content stays above the overlay */
        }

        /* iframe for live stream */
        iframe {
            width: 100%;
            height: 500px;
            border: none;
            border-radius: 5px;
        }

        /* Information Box */
        .info-box {
            margin-top: 20px;
            font-size: 20px;
        }

        /* Heading Style */
        h1 {
            font-size: 32px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>

<body>

    <!-- Stream Container -->
    <div class="stream-container">
        <h1>Gangarama Temple, Nawam Maha Perahera 2025 - Live Stream</h1>

        <!-- YouTube Live Embed -->
        <iframe src="https://www.youtube.com/embed/SK0rmV8VPoU" title="Gangarama Temple, Nawam Maha Perahera 2025" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>


    </div>

</body>

</html>