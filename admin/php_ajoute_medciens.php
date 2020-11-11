
<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=sql7.freemysqlhosting.net;dbname=sql7375839;charset=utf8', 'sql7375839', 'imnTCVQxTz');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$query = $bdd->prepare('INSERT INTO medciens (email, password,fullname,speciality)
												VALUES(:email, :password, :fullname, :speciality)');
$query->bindParam(':email', $_POST['email']);
$query->bindParam(':password', $_POST['password']);
$query->bindParam(':fullname', $_POST['fullname']);
$query->bindParam(':speciality', $_POST['speciality']);
$query->execute();
header("location: https://cheikhzaid.herokuapp.com/admin/table_medciens.php");
?>
