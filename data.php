<?php

$host = 'your_host';
$db = 'your_database';
$user = 'your_username';
$password = 'your_password';

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
