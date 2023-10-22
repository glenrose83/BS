<?php
include_once '../../bootstrap.php';


// //Checking and sanitizing input data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);    
$status = filter_input(INPUT_POST,'status', FILTER_SANITIZE_STRING);
          
        $data=[
           'status' => $status,
           'id' => $id
        ];
   

    //Updating the DB        
    $sql = "UPDATE orders SET status=:status WHERE id=:id";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);


echo "Done";
} 

