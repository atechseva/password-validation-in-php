<?php
$mysql_host='localhost';
$mysql_user='root';
$mysql_password='';
$mysql_db='passhash';
$conn= mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db) or die("Error " . mysqli_error($conn));
?>