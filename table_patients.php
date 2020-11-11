<?php include('server.php') ?>
<?php
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('https://cheikhzaid.herokuapp.com/login_scan.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assetsss/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assetsss/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

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
                      <a href="http://www.creative-tim.com" class="simple-text">
                          Medcien
                      </a>
                  </div>
                  <ul class="nav">
                      <li>
                          <a class="nav-link" href="patien_reservation_form.php">
                              <i class="nc-icon nc-chart-pie-35"></i>
                              <p>Ajouter patient(e)</p>
                          </a>
                      </li>
                      <li  class="nav-item active">
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
		<div class="col-md-12">
			<div class="panel panel-info">
			  <div class="panel-heading"><b>Listes des patients</b> </div>
			  <div class="panel-body">
				<table class="table table-hover">
				<thead>
					<tr>
						<th>CIN</th>
						<th>Nom</th>
						<th>Prenom</th>
						<th>Scanner</th>
						<th>medcien</th>
						<th>Date</th>
						<th>Malade</th>
            <th>Numero</th>
            <th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				    $per_page = 5;

				if(!isset($_GET['page'])){
					$page = 1;
				}else{
					$page = (int)$_GET['page'];
				}

					$users = mysqli_query($db, "SELECT * FROM `patient`");
					$num = 1;
					while($user = mysqli_fetch_assoc($users)){

						echo '
							<tr>
								<td>'.$user['CIN'].'</td>
								<td>'.$user['nom'].'</td>
								<td>'.$user['prenom'].'</td>
								<td>'.$user['id_scanner'].'</td>
								<td>'.$user['id_medcin'].'</td>
								<td>'.$user['datee'].'</td>
                <td>'.$user['malade'].'</td>
                <td>'.$user['numero'].'</td>

							    <td><a href="https://cheikhzaid.herokuapp.com/cheikhzaid/php_delete_patients_reser.php?cin='.$user['CIN'].'" class="btn btn-danger btn-xs">supprimer</a></td>


							</tr>
							';

					$num++;
					}
				?>

				</tbody>
				</table>


			</div>
		</div>
	</div>

</article>
<?php
	$n='';

	$users = mysqli_query($db, "SELECT * FROM `patient`  ");
					$n = 1;
					while($user = mysqli_fetch_assoc($users)){
					$n++;
					}

    $n=$n-1;
	echo'
	<div class="col-lg-9"> ( le nombre des patients est '.$n.' )

	</div>';
?>

</div>
  </body>
</html>
