<?php

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

?>