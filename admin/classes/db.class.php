<?php 

class DB {

    protected function __construct(){
        $host = '127.0.0.1';
        $db   = 'basicshop';
        $user = 'root';
        $pass = '';
        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;

    }


}