<?php
session_start();
include_once '../../bootstrap.php';

//Getting the right DB
include '../../shops/'. $_SESSION['shopname'] .'/shop_db_class.php';

$database = new DatabaseShop;


if(isset($_GET['action'])){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

    if($action == "delete"){


    //Setting ga4 code to empty
    $data=[
       'data' => 0,
       'disable' => 0
     ];

   
    $sql = "UPDATE `tracking` SET code=:data, status=:disable WHERE id=1";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute($data);
    

   Header('Location: ../settings.php?status=TrackingcodeDeleted');


    } 
} else {

    Header('Location: ../settings.php');
}