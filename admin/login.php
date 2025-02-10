<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities." />
    <meta name="keywords"
        content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app" />
    <meta name="author" content="pixelstrap" />
    <link rel="icon" href="assets/images/dashboard/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/dashboard/favicon.png" type="image/x-icon" />
    <title>Sri Lanka Western Province Touristboard</title>

    <!-- Google font-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,500;1,600;1,700;1,800;1,900&display=swap" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" />

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css" />

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify-icons.css" />

    <!-- slick icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick-theme.css" />

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css" />

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body>
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <div class="authentication-box">
            <div class="container">
                <div class="row">
<!-- add logo image -->
                    <div class="col-md-12 p-0 card-left">
                        <div>
                            <div class="card-body">
                                <div class="p-4 rounded">
                                    <div class="text-center">
                                        <img src="../images/logo/logo_.png" alt="logo" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-12 p-0 card-right">
                        <div class="card tab2-card card-login">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="top-profile-tab" data-bs-toggle="tab"
                                            href="#top-profile" role="tab" aria-controls="top-profile"
                                            aria-selected="true"><span class="icon-user me-2"></span>Login</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="top-tabContent">
                                    <div class="tab-pane fade show active" id="top-profile" role="tabpanel"
                                        aria-labelledby="top-profile-tab">
                                        <form class="form-horizontal auth-form" id="loginForm">
                                            <div class="form-group">
                                                <input required="" name="username" id="username" type="text"
                                                    class="form-control username" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input required="" name="password" id="password" type="password"
                                                    class="form-control password" placeholder="Password">
                                            </div>
                                            <div class="form-terms">
                                                <div class="form-check mesm-2">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="customControlAutosizing" />
                                                    <label class="form-check-label ps-2"
                                                        for="customControlAutosizing">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="err-msg text-danger"></div>
                                            <div class="form-button">
                                                <button class="btn btn-primary" type="button"
                                                    id="btn_login">Login</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>

    <!-- Sidebar jquery-->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/slick.js"></script>

    <!-- lazyload js-->
    <script src="assets/js/lazysizes.min.js"></script>

    <!--right sidebar js-->
    <script src="assets/js/chat-menu.js"></script>
    <!-- login.js -->
    <script src="assets/js/login.js"></script>
    <!--script admin-->
    <script src="assets/js/admin-script.js"></script>
    <script>
        $(".single-item").slick({
            arrows: false,
            dots: true,
        });
    </script>
</body>

</html>