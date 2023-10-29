<?php
include_once '../../includes/db_connection.php';

// //Checking and sanitizing input data
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$description = filter_input(INPUT_POST,'description', FILTER_SANITIZE_STRING);
$info = filter_input(INPUT_POST,'info', FILTER_SANITIZE_STRING);

} else {
    header('Location: ../settings.php');
}


//Validating Input data
if (empty($description)){
    header('Location: ../settings.php?error=emptyfield');
} 

//adding to DB
$data=[
    'description' => $description,
    'info' => $info,
    'status' => 0  
 ];

$sql = "INSERT INTO payment_options_custom (options,info,status) VALUES (:description,:info,:status)";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);


Header('Location: ../settings.php?status=paymentTypeAdded');
