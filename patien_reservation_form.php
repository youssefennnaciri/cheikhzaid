<?php include('server.php') ?>
<?php
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: https://cheikhzaid.herokuapp.com/login_scan.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assetsss/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assetsss/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Medcin</title>
    <meta content='width=device-width, initial-s  cale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assetsss/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assetsss/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assetsss/css/demo.css" rel="stylesheet" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


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
                      <a href="https://cheikhzaid.herokuapp.com/patien_reservation_form.php" class="simple-text">
                          Medcien
                      </a>
                  </div>
                  <ul class="nav">
                      <li class="nav-item active">
                          <a class="nav-link" href="patien_reservation_form.php">
                              <i class="nc-icon nc-chart-pie-35"></i>
                              <p>Ajouter patient(e)</p>
                          </a>
                      </li>
                      <li>
                          <a class="nav-link" href="table_patients.php">
                              <i class="nc-icon nc-circle-09"></i>
                              <p>Table des patients</p>
                          </a>
                      </li>
                      <li class="nav-item active active-pro">

                        <?php  if (isset($_SESSION['username'])) ;?>
                      <a class="nav-link active" href="logout.php">
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
  <article class="col-lg-9">
	<div class="row">
	<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="panel panel-info">
			  <div class="panel-heading"><b>Nouveau Patient(e) :</b></div>
			  <div class="panel-body">
				<form action="server.php" method="POST" class="form-horizontal" ">
				  <div class="form-group">
					<label  class="col-sm-2 control-label">CIN</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" name="cin" id="cin" >
					</div>
				  </div>

				  <div class="form-group">
					<label for="nom" class="col-sm-2 control-label">Nom</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" name="nom" id="nom" >
					</div>
				  </div>

					<div class="form-group">
					<label for="prenom" class="col-sm-2 control-label">Prenom</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" name="prenom" id="prenom"  >
					</div>
				  </div>

					<div class="form-group">
					<label for="date" class="col-sm-2 control-label">Date</label>
					<div class="col-sm-5">
					  <input type="date" class="form-control" name="date" id="date"  >
					</div>
				  </div>

				  <div class="form-group">
					<label for="scanner" class="col-sm-2 control-label">Scanner</label>
					<div class="col-sm-3">
					  <select class="form-control" name="scanner" id="scanner">
            <?php
              $sql="SELECT `id`, `nom`, `nombredeplacedisponible`, `datee`, `description` from scanners";
              $result=$db->query($sql);
              if($result->num_rows >0){
                  while($row=$result->fetch_assoc()){

                    echo "<option  value=".$row["id"].">" .$row["nom"]. "</option>";
                  }
              }
              else{
                  echo "0 result";
              }
            ?>
					  </select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="malade" class="col-sm-2 control-label">Malade</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" name="malade" id="malade" >
					</div>
				  </div>


				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" name="submit_pat" class="btn btn-danger">Ajouter</button>
					</div>
				  </div>
				</form>
			  </div>
			</div>
		</div>
	</div>

</article>
</div>
</div>
  </body>
  </html>
