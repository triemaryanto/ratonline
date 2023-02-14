<?php
//hostinger...
// $host="localhost";
// $user="u421499234_diman";
// $pass="D1m4n25*@";
// $db="u421499234_rat";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rat";

// Create connection
$kon = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($kon->connect_error) {
	die("Connection failed: " . $kon->connect_error);
}
