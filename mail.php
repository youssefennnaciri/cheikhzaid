<?php

$name= $_POST['name'];
$sub = $_POST['subject'];
$msg = $_POST['message'];

$rec = "ennaciri.youssef47gmail.com";
mail($rec,$sub,$msg);

header("https://cheikhzaid.herokuapp.com/index.php");
?>
