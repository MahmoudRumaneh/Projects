<?php 
$host = 'localhost';
$dbname = 'beehealthy';
$connectionString= "mysql:host=$host;dbname=$dbname";
$username = 'root';
$password = '';
    $pdo = new PDO($connectionString,$username,$password);
    $conn = mysqli_connect($host,$username,$password,$dbname);
?>