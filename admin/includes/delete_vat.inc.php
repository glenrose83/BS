<?php
session_start();
include_once '../../bootstrap.php';

//Getting the right DB
include '../../shops/'. $_SESSION['shopname'] .'/shop_db_class.php';

$database = new DatabaseShop;


// //Checking for og ID
if(isset($_GET['id'])){

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    

    $data=[
    'id' => $id
     ];

    //Updating the DB        
    $sql = "DELETE FROM `vat` WHERE id=:id";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute($data);
    
    
    header('Location: ../settings.php?status=vatOptionDeleted');

    }
