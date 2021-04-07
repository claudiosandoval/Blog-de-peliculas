<?php 

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'filmoteca';
$port = '33065';

$db = mysqli_connect($server, $username, $password, $database, $port);

mysqli_query($db, "SET NAMES 'utf8'");




?>