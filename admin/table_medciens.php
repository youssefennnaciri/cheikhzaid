<?php include('../server.php') ?>
<?php
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('https://cheikhzaid.herokuapp.com/login_scan.php');
  }
?>
<?php

try
{
    $pdo = new PDO('mysql:host=sql7.freemysqlhosting.net;dbname=sql7375839;charset=utf8', 'sql7375839', 'imnTCVQxTz');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
    $sql = 'SELECT * FROM medciens';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="assetsss/img/apple-icon.png">
      <link rel="icon" type="image/png" href="assetsss/img/favicon.ico">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>Table dse medcins</title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <!--     Fonts and icons     -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
      <!-- CSS Files -->
      <link href="assetsss/css/bootstrap.min.css" rel="stylesheet" />
      <link href="assetsss/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
      <!-- CSS Just for demo purpose, don't include it in your project -->
      <link href="assetsss/css/demo.css" rel="stylesheet" />
      <title>Table dse medcins</title>

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
                            Admin
                        </a>
                    </div>
                    <ul class="nav">
                        <li>
                            <a class="nav-link" href="ajoute_medciens.php">
                                <i class="nc-icon nc-chart-pie-35"></i>
                                <p>Ajouter medcins</p>
                            </a>
                        </li>
                        <li class="nav-item active">
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

                        <a class="nav-link active" href="../logout.php">                            <i class="nc-icon nc-alien-33"></i>
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
   			  <div class="panel-heading"><b>Listes des medciens</b> </div>
   			  <div class="panel-body">
   				<table class="table table-hover">
   				<thead>
                    <tr>
                        <th>email</th>
                        <th>password</th>
                        <th>fullname</th>
                        <th>speciality</th>
                        <th>supprimer</th>
                        <th>modifier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['email']) ?></td>
                            <td><?php echo htmlspecialchars($row['password']); ?></td>
                            <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                            <td><?php echo htmlspecialchars($row['speciality']); ?></td>
                            <?php
                            $id = htmlspecialchars($row['id']);
                            $email=htmlspecialchars($row['email']);
                            $password=htmlspecialchars($row['password']);
                            $fullname=htmlspecialchars($row['fullname']);
                            $speciality=htmlspecialchars($row['speciality']);
                            ?>
                         <td> <?php echo " <a href='https://cheikhzaid.herokuapp.com/cheikhzaid/admin/php_delete_meciens.php?id=". $row['id']. "'>supprimer</a>" ?></td>
                         <td> <?php echo " <a href='https://cheikhzaid.herokuapp.com/cheikhzaid/admin/updateform_medciens.php?id=". $id. "'>update</a>" ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
          </div>
          </div>
          </div>

          </article>

</div>
    </body>
</div>
</html>
