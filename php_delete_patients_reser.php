<?php
try
{
	$bdd = new PDO('mysql:host=sql7.freemysqlhosting.net;dbname=sql7375839;charset=utf8', 'sql7375839', 'imnTCVQxTz');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$query = $bdd->prepare("DELETE FROM patient WHERE cin=:cin");
   $query->bindParam(':cin', $_GET['cin']);
         $query->execute();

header("location: https://cheikhzaid.herokuapp.com/table_patients.php");


?>
