<?php
session_start();
include_once '../../bootstrap.php';

//Check if user is logged in
User::isLoggedIn();

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
    $sql = "DELETE FROM `categories` WHERE id = :id";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute($data);
    

   Header('Location: ../manage_categories.php?status=category_deleted');


    } else {

   Header('Location: ../index.php');
}