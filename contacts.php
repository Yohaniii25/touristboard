<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Contact Us</title>
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

<body>
<?php include('preloader.php'); ?>
  <div class="page">

    <?php
    include('header.php');
    ?>
    <!-- Breadcrumbs-->
    <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url(./images/home/new_bread.jpg);" data-preset='{"title":"Breadcrumbs","category":"header","reload":false,"id":"breadcrumbs"}'>
      <div class="container">
        <h4 class="breadcrumbs-custom-title">Contacts</h4>
        <ul class="breadcrumbs-custom-path">
          <li><a href="home.php">Home</a></li>
          <li class="active">Contacts</li>
        </ul>
      </div>
    </section>

    <!-- includes sticky.php -->
    <?php include('sticky.php'); ?>

    <!--Contact Info-->
    <section class="section section-md bg-default text-center">
      <div class="container">
        <h2 style="font-weight: bold; font-family: 'Quintessential', serif; text-transform: capitalize;" >Connect With Us</h2>
        <div class="row row-30">
          <div class="col-md-6 col-lg-3 wow fadeInUp">
            <div class="box-icon-modern">
              <div class="box-icon-inner decorate-triangle"><span class="icon-xl linearicons-map2 icon-primary"></span></div>
              <h5 class="box-icon-modern-title"><a href="#">Address</a></h5>
              <p class="box-icon-modern-text">8th floor, Western Provincial Council Office Complex, Denzil Kobbekaduwa Mawatha, Battaramulla</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".1s">
            <div class="box-icon-modern">
              <div class="box-icon-inner decorate-circle"><span class="icon-xl linearicons-telephone icon-primary"></span></div>
              <h5 class="box-icon-modern-title"><a href="#">Phone</a></h5>
              <p class="box-icon-modern-text">011 – 2092530</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".2s">
            <div class="box-icon-modern">
              <div class="box-icon-inner decorate-rectangle"><span class="icon-xl linearicons-envelope icon-primary"></span></div>
              <h5 class="box-icon-modern-title"><a href="#">E-mail</a></h5>
              <p class="box-icon-modern-text"><a href="mailto:#"></a>touristboardwp@gmail.com</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".3s">
            <div class="box-icon-modern">
              <div class="box-icon-inner decorate-circle"><span class="icon-xl linearicons-clock3 icon-primary"></span></div>
              <h5 class="box-icon-modern-title"><a href="#">Hours</a></h5>
              <p class="box-icon-modern-text">Monday - Friday: 9:00am - 5:00pm</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--Mailform-->
    <section class="section section-lg bg-image-11">
      <div class="container">
        <h3 style="font-weight: bold; font-family: 'Quintessential', serif; text-transform: capitalize;">Contact Information</h3>
        <div class="row offset-lg">
          <div class="col-12 column-bg-5">
            <div class="row row-30">
              <div class="col-lg-4">
                <div class="contact-info-box">

                  <!-- <p>Welcome to the Western Province Tourist Board's contact page! We're here to assist you with any inquiries, information, or support you may need. Please find our contact details below</p><span class="adress">204, Western Provincial Council Office Complex, <br class="d-none d-xl-block">Denzil Kobbekaduwa Mawatha, Battaramulla</span> -->
                  <h5>Chairman</h5>
                  <p>
                    Name - Mr. Sugath Hewapathirana <br>
                    T.P Number - 011 – 2092530 <br>
                    Fax - 011 – 2092787 <br>
                    Email - touristboardwp@gmail.com / sugathshp@gmail.com
                  </p>
                </div><br>
                <div class="contact-info-box">

                  <!-- <p>Welcome to the Western Province Tourist Board's contact page! We're here to assist you with any inquiries, information, or support you may need. Please find our contact details below</p><span class="adress">204, Western Provincial Council Office Complex, <br class="d-none d-xl-block">Denzil Kobbekaduwa Mawatha, Battaramulla</span> -->
                  <h5>General Manager</h5>
                  <p>
                    Name - Mr. Palitha Malporu <br>
                    T.P Number - 011 - 2092688 <br>
                    Fax - 011 – 2092787 <br>
                    Email - touristboardwp@gmail.com
                  </p>
                </div>
              </div>
              <div class="col-lg-8">
                <!--RD Mailform-->
                <form class="rd-mailform text-start row row-narrow-10 row-10 contact-form" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                  <div class="col-lg-6">
                    <div class="form-wrap">
                      <label class="form-label" for="contact-name">First Name</label>
                      <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-wrap">
                      <label class="form-label" for="contact-name-2">Last Name</label>
                      <input class="form-input" id="contact-name-2" type="text" name="last-name" data-constraints="@Required">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-wrap">
                      <label class="form-label" for="contact-email">Your EMail</label>
                      <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Required @Email">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-wrap">
                      <label class="form-label" for="contact-phone">Phone</label>
                      <input class="form-input" id="contact-phone" type="text" name="phone" data-constraints="@Required @PhoneNumber">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-wrap">
                      <label class="form-label" for="contact-message">Your Message</label>
                      <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                    </div>
                  </div>
                  <div class="form-button col-lg-12 text-end">
                    <button class="button-md button button-dark-blue" type="submit">Send message</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <table class="container-contact">
      <tr>
        <td class="column">

        </td>
        <td class="column general-manager">

        </td>
      </tr>
    </table>

    <!--Google Map-->
    <section class="section">

      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9100873075454!2d79.92466532373251!3d6.901355768659694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2452c9f1e60eb%3A0xb2d094979b374349!2sOffice%20of%20the%20Chief%20Secretary%2C%20Western%20Province!5e0!3m2!1sen!2slk!4v1702875826333!5m2!1sen!2slk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <!--Info Section-->
    <section class="section section-md bg-default">
      <div class="container">
        <h2 style="font-weight: bold; font-family: 'Quintessential', serif; text-transform: capitalize;">Explore your journey!</h2>
        <div class="row row-40 offset-lg">
          <div class="col-xl-6 wow fadeInLeft">
            <p>The Tourist Promotion Policies in the Western Province aim to enhance tourism through a comprehensive strategy. Key initiatives include empowering local communities to manage tourist destinations, promoting gender inclusivity in training programs, incorporating feedback mechanisms in media, aligning actions with a five-year strategic plan, fostering collaboration with service and government institutions, ensuring continuous staff development, conducting awareness programs, and maintaining regulatory compliance through regular license updates.</p>
          </div>
          <div class="col-xl-3 col-sm-6 wow fadeInUp">
            <ul class="list-marked">
              <li>Community Empowerment</li>
              <li>Gender Inclusivity</li>
              <li>Feedback Mechanism</li>
              <li>Strategic Planning</li>
              <!-- <li>Handpicked hotels</li> -->
            </ul>
          </div>
          <div class="col-xl-3 col-sm-6 wow fadeInUp">
            <ul class="list-marked">
              <li>Stakeholder Collaboration</li>
              <li>Staff Development</li>
              <li>Public Awareness</li>
              <li>Regulatory Compliance</li>
              <!-- <li>Visas</li> -->
            </ul>
          </div>
        </div>
      </div>
    </section>
    <?php
    include('footer.php');
    ?>
  </div>
  <div class="snackbars" id="form-output-global"></div>
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>