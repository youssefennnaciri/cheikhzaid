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

$query = $bdd->prepare('UPDATE scanners SET nom=:email, nombredeplacedisponible=:password,description=:fullname WHERE id=:id');
$query->bindParam(':email', $_POST['nom']);
$query->bindParam(':password', $_POST['nombredeplacedisponible']);
$query->bindParam(':fullname', $_POST['description']);
$query->bindParam(':id', $_POST['id']);
$query->execute();

header("https://cheikhzaid.herokuapp.com/cheikhzaid/admin/table_scanners.php");
?>
