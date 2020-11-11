<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('sql7.freemysqlhosting.net', 'sql7375839', 'imnTCVQxTz', 'sql7375839');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password)
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('https://cheikhzaid.herokuapp.com/index.php');
  }

}
//LOGING USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('https://cheikhzaid.herokuapp.com/index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
//enregister le patient(e)
if(isset($_POST['submit_pat'])){
  $cin = $_POST['cin'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $datee = $_POST['date'];
  $scanner= $_POST['scanner'];
  $malade = $_POST['malade'];
  $med=$_SESSION['id'];
  echo "nous avons les infos";

$bdd = new PDO('mysql:host=sql7.freemysqlhosting.net;dbname=sql7375839;charset=utf8', 'sql7375839', 'imnTCVQxTz');

$req = $bdd->prepare('SELECT nombredeplacedisponible FROM scanners where id=?');
$req->execute(array($_POST['scanner']));

while ($donnees= $req->fetch())
{
  $placeDisponible =  $donnees['nombredeplacedisponible'] ;
  echo $placeDisponible.'<br>';
}
$req->closeCursor();

$placeActuelle = 0;
$req = $bdd->prepare('SELECT datee,count(*) FROM patient where id_scanner = ? and datee >= NOW() GROUP BY datee order by datee desc, COUNT(*) DESC limit 1');
$req->execute(array($_POST['scanner']));
while ($donnees= $req->fetch())
{
  $placeActuelle = $donnees['count(*)'];
  $dateActuelle = $donnees['datee'];
  echo   $dateActuelle.' '.  $placeActuelle.'<br>';
}

if($placeActuelle > 0 && $placeActuelle < $placeDisponible)
{
  echo "cool";
  $date = strtotime("+1 day", strtotime(date("Y-m-d")));
  echo date("Y-m-d", $date);


  $req = $bdd->prepare("INSERT INTO patient(CIN, nom, prenom, id_scanner, id_medcin, datee, malade, numero)
VALUES(:cin,:nom,:prenom,:id_scanner,:id_medcin,:datee,:malade,:numero)");
$req->execute(array(
	'cin' => $cin,
	'nom' => $nom,
	'prenom' => $prenom,
	'id_scanner' => $scanner,
	'id_medcin' => $med,
  'datee' => $dateActuelle,
  'malade' => $malade,
  'numero' => $placeActuelle + 1
  ));

  echo "INSERTED";

}

if($placeActuelle < 1)
{
  echo "nothing";
  $place = 1;

  $date = strtotime("+1 day", strtotime(date("Y-m-d")));
  echo date("Y-m-d", $date);

$req = $bdd->prepare("INSERT INTO patient(CIN, nom, prenom, id_scanner, id_medcin, datee, malade, numero)
VALUES(:cin,:nom,:prenom,:id_scanner,:id_medcin,:datee,:malade,:numero)");
$req->execute(array(
	'cin' => $cin,
	'nom' => $nom,
	'prenom' => $prenom,
	'id_scanner' => $scanner,
	'id_medcin' => $med,
  'datee' => date("Y-m-d", $date),
  'malade' => $malade,
  'numero' => $place
	));

echo 'Le jeu a bien été ajouté !';


}

if($placeActuelle >= $placeDisponible)
{
 echo "BZEAF";
 $date = strtotime("+1 day", strtotime($dateActuelle));
 echo date("Y-m-d", $date);
 $place = 1;

 $req = $bdd->prepare("INSERT INTO patient(CIN, nom, prenom, id_scanner, id_medcin, datee, malade, numero)
 VALUES(:cin,:nom,:prenom,:id_scanner,:id_medcin,:datee,:malade,:numero)");
 $req->execute(array(
   'cin' => $cin,
   'nom' => $nom,
   'prenom' => $prenom,
   'id_scanner' => $scanner,
   'id_medcin' => $med,
   'datee' => date("Y-m-d", $date),
   'malade' => $malade,
   'numero' => $place
   ));

 echo 'Le jeu a bien été ajouté !';

}

try
{
  $bdd = new PDO('mysql:host=sql7.freemysqlhosting.net;dbname=sql7375839;charset=utf8', 'sql7375839', 'imnTCVQxTz');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('SELECT prenom,cin,patient.nom as p_nom,patient.datee as p_date,numero,scanners.nom as s_nom FROM patient  join scanners on scanners.id = patient.id_scanner WHERE cin = ?');
$req->execute(array($_GET['cin']));


while ($donnees = $req->fetch())
{
    echo "CIN : ".$donnees['cin'].'<br>';
    echo "Patient Nom  : ".$donnees['p_nom'].'<br>';
    echo "Patient Prenom  : ".$donnees['prenom'].'<br>';
    echo " Date  : ".$donnees['p_date'].'<br>';
    echo " Numerro   : ".$donnees['numero'].'<br>';
    echo "Scanner : ".$donnees['s_nom'] ;

}


$req->closeCursor();


header('https://cheikhzaid.herokuapp.com/table_patients.php?cin='.$cin);



  /*$xx="SELECT count(*) FROM patient";
  $fa = mysqli_query($db, $xx);

  if ($result = mysqli_query($db, "SELECT * FROM patient")) {
  echo "Returned rows are: " . mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
}
  $query = "INSERT INTO patient(CIN, nom, prenom, id_scanner, id_medcin, datee, malade, numero)
            VALUES('$cin','$nom','$prenom','$scanner',$med,'$datee','$malade',1)";
  mysqli_query($db, $query);
  echo "patient(e) ajouter";
 header('https://cheikhzaid.herokuapp.com/table_patients.php');
if ($db->query($query) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $query . "<br>" . $db->error;
}
*/
}
//LOGIN CLIENT/DOCTEUR/Admin
if(isset($_POST['sus'])){
  $getshit=$_POST['hello'];
  //CLIENT
  if($getshit==12){
    echo "t'es un(e) client";
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
      array_push($errors, "Username is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
      //$password = md5($password);
      $query = "SELECT `CIN`, `nom`, `prenom`, `id_scanner`, `id_medcin`, `datee`, `malade`, `numero` FROM patient where nom='$username' AND CIN='$password'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1) {
        $row=$results->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['cin'] = $row['CIN'];
        $_SESSION['prenom'] = $row['prenom'];
        $_SESSION['datee'] = $row['datee'];
        $_SESSION['malade'] = $row['malade'];
        $_SESSION['id_scanner'] = $row['id_scanner'];
        $_SESSION['id_medcin'] = $row['id_medcin'];
        $_SESSION['numero'] = $row['numero'];

        $_SESSION['success'] = "You are now logged in";
        header('https://cheikhzaid.herokuapp.com/patient_session.php');
        //echo " welcome";
      }else {
        array_push($errors, "Wrong username/password combination");
        echo "repetez une autre fois";
      }
    }
  }
  //DOCTEIR
  else if ($getshit==13){
    //echo "t'es un(e) docteur";
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
      array_push($errors, "Username is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
      //$password = md5($password);
      $query = "SELECT * FROM medciens where email='$username' AND password='$password'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        $row=$results->fetch_assoc();
        $_SESSION['id'] = $row["id"];


        header('https://cheikhzaid.herokuapp.com/patien_reservation_form.php');
        //echo " welcome";
      }else {
        array_push($errors, "Wrong username/password combination");
        echo " repetez une autre fois";
      }
    }
  }
  //AGENCE
  else {
    echo "vous etes agence";
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
      array_push($errors, "Username is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
      //$password = md5($password);
      $query = "SELECT * FROM admin where username='$username' AND password='$password'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('https://cheikhzaid.herokuapp.com/admin/admin_espace.php');
        //echo " welcome";
      }else {
        array_push($errors, "Wrong username/password combination");
        echo "repetez une autre fois";
      }
    }
  }
}

//SHOW TABLE
if (isset($_POST['tablepage'])) {
        $sql="select id,username,email,password from users";
        $result=$db->query($sql);
        if($result->num_rows >0){
            while($row=$result->fetch_assoc()){
              echo "<tr><td>" .$row["id"]."</td><td>" .$row["username"]."</td><td>" .$row["email"]."</td><td>" .$row["password"] ." </td></tr> ";
            }
            echo "</table>";
        }
        else{
            echo "0 result";
        }
            $db->close();
}

?>
