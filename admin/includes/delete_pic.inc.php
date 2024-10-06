<?php
session_start();
include_once '../../bootstrap.php';
$database = new Database;

if(isset($_GET['id'])){
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $requestpage = filter_input(INPUT_GET, 'requestpage', FILTER_SANITIZE_NUMBER_INT);
    
    //Delete category in DB
    $data=[
        'id' => $id,
    ];

    //Delete picture in DB
    $sql = "DELETE FROM `product_images` WHERE id = :id";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute($data);
    

    Header('Location: ../gallery.php?id='.$requestpage.'&status=picture_deleted');


    } else {

    Header('Location: ../index.php');
}