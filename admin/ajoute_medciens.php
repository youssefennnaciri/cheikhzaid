<?php include('../server.php') ?>
<?php
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: https://cheikhzaid.herokuapp.com/../login_scan.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assetsss/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assetsss/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Ajouter des medcins</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <!-- CSS Files -->
  <link href="assetsss/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assetsss/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assetsss/css/demo.css" rel="stylesheet" />
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #669ba7;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #669ba7;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>

</head>
<body>
  <!--
  side nav
  -->    <div class="wrapper">
        <div class="sidebar" data-image="../assetsss/img/sidebar-5.jpg" data-color="blue">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a  class="simple-text">
                        Admin
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="ajoute_medciens.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Ajouter medcins</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="table_medciens.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Table des medcins</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="ajoute_scanners.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Ajouter scanners</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="table_scanners.php">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Table des scanners</p>
                        </a>
                    </li>
                    <li class="nav-item active active-pro">
                      <?php  if (isset($_SESSION['username'])) ;?>

                    <a class="nav-link active" href="../logout.php">
                        <i class="nc-icon nc-alien-33"></i>
                        <p>LOG OUT</p>
                    </a>
                </li>

                </ul>
            </div>
        </div>
        <!--
      side nav
      -->
        <div class="main-panel">  <!-- nessicery  -->
<div class="container">
  <form action="php_ajoute_medciens.php" method="post">
  <div class="row">
    <div class="col-25">
      <label for="fname">email</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="email" placeholder="Your email.." required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">password</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="password" placeholder="Your password.." required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">fullname</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="fullname" placeholder="Your fullname.." required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">speciality</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="speciality" placeholder="speciality.." required>
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Ajouter">
  </div>
  </form>
</div>
</div>
</body>
</html>
