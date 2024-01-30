<?php
$host = 'localhost';
$u='root';
$p='';
$db ='restaurant';
$conn = mysqli_connect($host,$u,$p,$db);
if (!$conn) {
	die("Can't connect to mysql, please check your server info");
	# code...
}
?>
