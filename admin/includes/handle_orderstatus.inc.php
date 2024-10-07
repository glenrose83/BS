<?php
session_start();
include_once '../../bootstrap.php';

//Getting the right DB
include '../../shops/'. $_SESSION['shopname'] .'/shop_db_class.php';

$database = new DatabaseShop;


// //Checking and sanitizing input data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);    
$status = filter_input(INPUT_POST,'status', FILTER_SANITIZE_STRING);
          
        $data=[
           'status' => $status,
           'id' => $id
        ];
   

    //Updating the DB        
    $sql = "UPDATE `orders` SET status=:status WHERE id=:id";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute($data);


Header('Location: ../handle_order.php?id='.$id.'&status=changed');
} 

