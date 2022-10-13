<?php
$db_username = 'root';
$db_password = '';
$db_name = 'Cosplay2';
$db_host = 'localhost';
$mysqli = new mysqli($db_host,$db_username, $db_password,$db_name);
mysqli_query($mysqli, "SET NAMES 'utf8' ");
?>
