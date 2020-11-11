<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>index</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- Favicons -->
    <link href="assetss/img/favicon.png" rel="icon">
    <link href="assetss/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assetss/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assetss/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assetss/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assetss/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assetss/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assetss/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assetss/vendor/owl.carousel/assetss/owl.carousel.min.css" rel="stylesheet">
    <link href="assetss/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assetss/css/style.css" rel="stylesheet">

</head>

<body>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">contact@hcz.ma</a>
        <i class="icofont-phone"></i> +212(05) 37 68 70 15
        <i class="icofont-google-map"></i> Hôpital Cheikh Zaid B.P.6533, Avenue Allal El Fassi,Madinat Al Irfane, Hay Riad,Rabat 10 000.
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php">Cheikh Zaid</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li ><a href="index.php">Home</a></li>
          <li><a href="index.php#about">About</a></li>
          <li class="active"><a href="location: https://cheikhzaid.herokuapp.com/login_scan.php">Login</a></li>
          <li><a href="index.php#contact">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->




    </div>
  </header><!-- End Header -->




    <div class="login-clean">
        <form method="post" action="login_scan.php">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate"style="color: rgb(71,78,244);filter: invert(25%) saturate(199%);"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><select class="form-control" name="hello"><option value="12" selected="">patient(e)</option><option value="13">Medcien</option><option value="14">Admin</option></select></div>
            <div class="form-group"><button class="btn btn-primary btn-block" style="background-color: rgb(71,88,244);" type="submit" name="sus">Log In</button></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
