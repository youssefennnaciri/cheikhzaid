<?php
session_start();
$_SESSION = array();

session_destroy();
header("location: https://cheikhzaid.herokuapp.com/login_scan.php");

 ?>
