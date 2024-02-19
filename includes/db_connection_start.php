<?php

$host = 'localhost';
    $db   = 'bs';
    $user = 'root';
    $pass = '';
    $dsn = "mysql:host=$host;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass);
