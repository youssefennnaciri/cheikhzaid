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
$query = $bdd->prepare('INSERT INTO scanners(nom,nombredeplacedisponible,datee,description) VALUES(:nom,:nombredeplacedisponible,:datee, :description)');
$query->bindParam(':nom', $_POST['nom']);
$query->bindParam(':nombredeplacedisponible', $_POST['nombredeplacedisponible']);
$query->bindParam(':datee', $_POST['datee']);
$query->bindParam(':description', $_POST['description']);
$query->execute();
header("location: https://cheikhzaid.herokuapp.com/admin/admin_espace.php");

?>
