<?php
/* session_start();
include_once '../../bootstrap.php';

if(isset($_GET['id'])){
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    

    //Setting primary_pic to 0 in DB

    $data=[
       'data' => $id
     ];

   
    $sql = "UPDATE product_images SET primary_pic=0 WHERE fk_id=:data";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute($data);
    

   Header('Location: ../edit_product.php?id='.$id.'?status=frontpageImageDeleted');



    } else {

   Header('Location: ../index.php'); */

}