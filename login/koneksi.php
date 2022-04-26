<?php
$host="localhost";
$user="root";
$pass="";
$db="rat";

$kon = mysqli_connect($host, $user, $pass);
	$kondb = mysqli_select_db($kon, $db);
?>