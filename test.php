<?php


    //Assigning to varibles
    $databasename = "recycleshop_8189875041119571";
    $databaseuser = "LunaRecycle_8189875041119571";
    $databasepwd =  "abc";

  

    //Setting user DB
    $host = 'localhost';
    $db   = $databasename;
    $user = $databaseuser;
    $pass = $databasepwd;


    $dsn = "mysql:host=$host;dbname=$db";

    $pdo = new PDO($dsn, $user, $pass);


    $stmt = $pdo->prepare("SELECT * FROM product_images");
    $product = $stmt->fetchALL();
        
    /* $stmt = $pdo->prepare("SELECT * FROM users");
    $userDetails = $stmt->fetchALL(); */

    var_dump($product);