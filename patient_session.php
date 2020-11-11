<?php include('server.php') ?>
<?php
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('https://cheikhzaid.herokuapp.com/login_scan.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']." ".$_SESSION['prenom']; ?></strong></p>
      <p>CIN <strong><?php echo $_SESSION['cin']; ?></strong></p>
      <p>numero <strong><?php echo $_SESSION['numero']; ?></strong></p>
      <p>date <strong><?php echo $_SESSION['datee']; ?></strong></p>

      <p>description <strong>
        <?php
        $sql="SELECT `id`, `nom`, `nombredeplacedisponible`, `datee`, `description`
        from scanners where id={$_SESSION['id_scanner']}";

        $result=$db->query($sql);
        if($result->num_rows >0){
            while($row=$result->fetch_assoc()){

              echo $row["description"];
            }
        }
        else{
            echo "0 result";
        }

        ?>
      </strong></p>
      <p>scanner <strong>
        <?php
        $sql="SELECT `id`, `nom`, `nombredeplacedisponible`, `datee`, `description`
        from scanners where id={$_SESSION['id_scanner']}";

        $result=$db->query($sql);
        if($result->num_rows >0){
            while($row=$result->fetch_assoc()){

              echo $row["nom"];
            }
        }
        else{
            echo "0 result";
        }

        ?>
      </strong></p>
      <p>Medcin <strong>
        <?php
        $sql="SELECT  `fullname`
        from medciens where id={$_SESSION['id_medcin']}";

        $result=$db->query($sql);
        if($result->num_rows >0){
            while($row=$result->fetch_assoc()){

              echo $row["fullname"];
            }
        }
        else{
            echo "0 result";
        }

        ?>
      </strong></p>
      <?php  if (isset($_SESSION['username'])) ;?>
    	<p> <a href="logout.php" style="color: blue;">logout</a> </p>
    <?php endif ?>
</div>

</body>
</html>
