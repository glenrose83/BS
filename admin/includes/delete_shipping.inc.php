<?php
include_once '../../bootstrap.php';


// //Checking for og ID
if(isset($_GET['id'])){

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    

    $data=[
    'id' => $id
     ];

    //Updating the DB        
    $sql = "DELETE FROM shipping WHERE id=:id";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
    
    
    header('Location: ../settings.php?status=shippingOptionDeleted');

    }
