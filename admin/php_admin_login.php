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
$query = $bdd->prepare("SELECT * FROM admin WHERE username = :userg AND password = :pwg");
   $query->bindParam(':userg', $_POST['username']);
      $query->bindParam(':pwg', $_POST['password']);
         $query->execute();
         $count = $query->rowCount();
         if($count==1){
         	header("location: https://cheikhzaid.herokuapp.com/admin/admin_espace.php");;
             }
             else
             	{
             		echo "no";
         }
?>
