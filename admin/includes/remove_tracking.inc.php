<?php
include_once '../../includes/db_connection.php';


if(isset($_GET['action'])){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

    if($action == "delete"){


    //Setting ga4 code to empty
    $data=[
       'data' => ""
     ];

   
    $sql = "UPDATE users SET ga4tracking=:data, ga4status=0";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
    

   Header('Location: ../settings.php?status=TrackingcodeDeleted');


    } 
} else {

    Header('Location: ../settings.php');
}