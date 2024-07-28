<?php
session_start();
include_once '../../bootstrap.php';
$database = new Database;


// //Checking for og ID
if(isset($_GET['id'])){

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    

    $data=[
    'id' => $id
     ];

    //Updating the DB        
    $sql = "DELETE FROM `coupons` WHERE id=:id";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute($data);
    
    
    header('Location: ../settings.php?status=couponDeleted');

    }
