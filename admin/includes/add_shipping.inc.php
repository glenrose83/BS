<?php
include_once '../../includes/db_connection.php';

// //Checking and sanitizing input data
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$shippingMethod = filter_input(INPUT_POST,'shippingMethod', FILTER_SANITIZE_STRING);
$time = filter_input(INPUT_POST,'time', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST,'price', FILTER_SANITIZE_NUMBER_INT);

} else {
    header('Location: ../settings.php');
}


//Validating Input data
if (empty($shippingMethod) || empty($time) || empty($price)){
    header('Location: ../settings.php?error=emptyfield');
} 

//adding to DB
$data=[
    'shippingMethod' => $shippingMethod,
    'price' => $price,
    'time' => $time
 ];

$sql = "INSERT INTO shipping (description,shippingTime,price) VALUES (:shippingMethod,:time,:price)";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);


Header('Location: ../settings.php?status=shippingOptionAdded');
