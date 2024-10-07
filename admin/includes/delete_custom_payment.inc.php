<?php
session_start();
include_once '../../bootstrap.php';

//Getting the right DB
include '../../shops/'. $_SESSION['shopname'] .'/shop_db_class.php';

$database = new DatabaseShop;

if(isset($_GET['id'])){
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    

    //Delete category in DB
    $data=[
        'id' => $id,
     ];

    //deleting picturefile
    $sql = "DELETE FROM `payment_options_custom` WHERE id = :id";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute($data);
    

   Header('Location: ../settings.php?status=customPaymentDeleted');


    } else {

   Header('Location: ../index.php');
}