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
$query = $bdd->prepare("DELETE FROM scanners WHERE id=:id");
   $query->bindParam(':id', $_GET['id']);
         $query->execute();

header("https://cheikhzaid.herokuapp.com/cheikhzaid/admin/table_scanners.php");
?>
