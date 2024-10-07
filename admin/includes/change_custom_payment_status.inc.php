<?php
session_start();
include_once '../../bootstrap.php';

//Getting the right DB
include '../../shops/'. $_SESSION['shopname'] .'/shop_db_class.php';

$database = new DatabaseShop;


// //Checking for GET-status og ID
if(isset($_GET['status'])){
    $status = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_NUMBER_INT);
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    if($status==1){
        $data=[
           'status' => 0,
           'id' => $id
        ];

        } else {
        
        $data=[
           'status' => 1,
           'id' => $id
        ];
        }

    //Updating the DB        
    $sql = "UPDATE `payment_options_custom` SET status=:status WHERE id=:id";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute($data);
    
    
    header('Location: ../settings.php?status=customPaymentstatusChanged');
}