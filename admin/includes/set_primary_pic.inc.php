<?php
session_start();
include_once '../../bootstrap.php';

if(isset($_GET['id'])){
    $requestpage = filter_input(INPUT_GET, 'requestpage', FILTER_SANITIZE_NUMBER_INT);
    $pic_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


     //Set url in DB on the new primary picture
    $data=[
        'id' => $requestpage
    ];

    $data1=[
        'id' => $pic_id
    ];

    //removing marking from old priamry pic
    $sql = "UPDATE product_images SET primary_pic=FALSE WHERE fk_id=:id AND primary_pic=1";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute($data);


    //marking new primary
    $sql = "UPDATE product_images SET primary_pic=TRUE WHERE id =:id";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute($data1);
    

     Header('Location: ../gallery.php?id='.$requestpage);


    } else {

    Header('Location: ../gallery.php?status=NoIDseletected');
}