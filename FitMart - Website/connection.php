<?php
$host = 'localhost';
$dbname = 'fitmart';
$connectionString = "mysql:host=$host;dbname=$dbname";
$username = 'root';
$password = '';
$pdo = new PDO($connectionString, $username, $password);
$conn = mysqli_connect($host, $username, $password, $dbname);
