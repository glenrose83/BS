<?php
session_start();
include_once '../../bootstrap.php';

//Getting the right DB
include '../../shops/'. $_SESSION['shopname'] .'/shop_db_class.php';

$database = new DatabaseShop;

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $symbol = filter_input(INPUT_POST,'symbol', FILTER_SANITIZE_STRING);
    $currency = filter_input(INPUT_POST,'currency', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_STRING);

    $data=[
        'currency' => $currency,
        'symbol' => $symbol,
        'id' => $id
     ];

 

    //Updating the DB        
    $sql = "UPDATE `currency` SET currency=:currency, symbol=:symbol WHERE id=:id";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute($data);
    
    
    header('Location: ../settings.php?status=currencyChanged');


    } else {
        header('Location: ../settings.php');
    }
    



