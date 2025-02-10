<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Header</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <header class="section page-header">

    <!-- RD Navbar -->
    <div class="rd-navbar-wrap" style="">

      <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">

        <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>

        <div class="rd-navbar-main-outer">
          <div class="rd-navbar-main">

            <!-- RD Navbar Panel -->
            <div class="rd-navbar-panel">

              <!-- RD Navbar Toggle -->
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>

              <!-- RD Navbar Brand -->
              <div class="rd-navbar-brand">
                <!-- Brand -->
                <a class="brand" href="https://touristboard.wp.gov.lk/home.php">
                  <img class="brand-logo-dark" src="images/logo/logo.png" alt="" width="112" height="19" />
                  <img class="brand-logo-light" src="images/logo-default-225x39.png" alt="" width="112" height="19" />
                </a>
              </div>

            </div>

            <div class="rd-navbar-main-element">
              <div class="rd-navbar-nav-wrap">
                <ul class="rd-navbar-nav">

                  <li class="rd-nav-item"><a class="rd-nav-link" href="index.php">Home</a></li>

                  <li class="rd-nav-item"><a class="rd-nav-link" href="about.php">About</a>
                    <ul class="rd-menu rd-navbar-dropdown">
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="introduction.php">Introduction</a></li>
                    </ul>
                  </li>

                  <li class="rd-nav-item"><a class="rd-nav-link" href="tours.php">Destinations</a>
                    <ul class="rd-menu rd-navbar-dropdown">
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tours.php?keyword=&category=1&segment=">Major</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tours.php?keyword=&category=2&segment=">Heritage</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tours.php?keyword=&category=3&segment=">Environment</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tours.php?keyword=&category=4&segment=">Leisure & Recreation</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tours.php?keyword=&category=5&segment=">Pristine</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tours.php?keyword=&category=6&segment=">Thrills Bliss Science</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tours.php?keyword=&category=7&segment=">Wild, Thrills</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tours.php?keyword=&category=8&segment=">Multi Culturalism</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tours.php?keyword=&category=9&segment=">Art and Craft</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tours.php?keyword=&category=10&segment=">Mice</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tours.php?keyword=&category=11&segment=">Museum</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tours.php?keyword=&category=12&segment=">Colombo Life</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tours.php?keyword=&category=13&segment=">Sports</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tours.php?keyword=&category=14&segment=">Agro</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tours.php?keyword=&category=15&segment=">Religious</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="tours.php?keyword=&category=16&segment=">Meditation</a></li>
                    </ul>
                  </li>

                  <li class="rd-nav-item"><a class="rd-nav-link" href="experiences.php">Experiences</a>
                    <ul class="rd-menu rd-navbar-dropdown">
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="colombo_packages.php">Colombo</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="kalutara_packages.php">Kalutara</a></li>
                      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="gampaha_packages.php">Gampaha</a></li>
                    </ul>
                  </li>

                  <li class="rd-nav-item"><a class="rd-nav-link" href="news.php">News</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="events.php">Events</a></li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="contacts.php">Contacts</a></li>
                </ul>
              </div>

              <!-- RD Navbar Search -->
              <div class="rd-navbar-search">
                <button class="rd-navbar-search-toggle rd-navbar-fixed-element-2" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                <form class="rd-search" action="/tours.php" data-search-live="rd-search-results-live" method="GET">
                  <div class="form-wrap">
                    <label class="form-label" for="rd-navbar-search-form-input">Search...</label>
                    <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off">
                    <div class="rd-search-results-live" id="rd-search-results-live"></div>
                  </div>
                  <button class="rd-search-form-submit fa-search" type="submit"></button>
                </form>
              </div>

              <!-- Add Google Translate -->
              <div id="google_translate_element"></div>

            </div>

          </div>

        </div>

      </nav>

    </div>

  </header>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script>
    $(document).ready(function() {
      var currentUrl = window.location.href;

      // Loop through each navigation link and compare it with the current URL
      $('.rd-navbar-nav a').each(function() {
        var linkUrl = $(this).attr('href');

        if (currentUrl.indexOf(linkUrl) !== -1) {
          $(this).closest('li').addClass('active');
        }
      });
    });
  </script>

  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'si,ta,de',
        layout: google.translate.TranslateElement.InlineLayout.VERTICAL
      }, 'google_translate_element');
    }
  </script>
  <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <style>
    #google_translate_element {
      position: relative;
    }

    #google_translate_element select {
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
      appearance: none; /* Removes default styling */
      background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg width%3D%2212%22 height%3D%2212%22 viewBox%3D%220 0 24 24%22 fill%3D%22none%22 xmlns%3D%22http://www.w3.org/2000/svg%22%3E%3Cpath fill%3D%22%23727C8D%22 d%3D%22M6 9l6 6 6-6H6z%22/%3E%3C/svg%3E');
      background-position: right 10px center;
      background-repeat: no-repeat;
      background-size: 10px 6px;
      width: auto; /* Ensure the dropdown expands to fit its content */
    }

    #google_translate_element select option {
      padding: 2px 10px;
    }

    #google_translate_element label {
      margin-right: 10px;
    }
    
    .skiptranslate.goog-te-gadget {
    color: #1e2227 !important;
}

a.VIpgJd-ZVi9od-l4eHX-hSRGPd {
    display: none !important;
}
  </style>

</body>
</html>