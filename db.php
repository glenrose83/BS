<?php

$host = '127.0.0.1';
$db   = 'alarmshoppen_13810521885226103';
$user = 'root';
$pass = '';


$dsn = "mysql:host=$host;dbname=$db";

$pdo = new PDO($dsn, $user, $pass);


