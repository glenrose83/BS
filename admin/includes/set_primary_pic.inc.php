<?php
include_once '../../bootstrap.php';

if(isset($_GET['id'])){
    $id = filter_input(INPUT_GET, 'requestpage', FILTER_SANITIZE_NUMBER_INT);
    $pic_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


    //SET NULL in DB where product ID is the same, then no primary picture is selected
    $data=[
        'id' => $id
     ];

     $sql = "UPDATE product_images SET primary_pic=NULL WHERE fk_id = :id";
     $stmt= $pdo->prepare($sql);
     $stmt->execute($data);


    //get url from DB to the new primary picture
    $data=[
        'id' => $pic_id
    ];


    $sql = "SELECT url FROM product_images WHERE id = :id";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
    $url = $stmt -> fetch();

    echo $url['url'];


     //Set url in DB on the new primary picture
    $data=[
        'id' => $pic_id,
        'url' => $url['url']
    ];


    $sql = "UPDATE product_images SET primary_pic=:url WHERE id = :id";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
   
    

     Header('Location: ../gallery.php?id='.$id);


    } else {

    Header('Location: ../gallery.php?status=NoIDseletected');
}