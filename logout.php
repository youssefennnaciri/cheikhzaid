<?php
session_start();
$_SESSION = array();

session_destroy();
header("https://cheikhzaid.herokuapp.com/login_scan.php");

 ?>
