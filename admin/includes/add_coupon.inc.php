<?php
session_start();
include_once '../../bootstrap.php';
$database = new Database;

// //Checking and sanitizing input data
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$name = filter_input(INPUT_POST,'name', FILTER_SANITIZE_STRING);
$code = filter_input(INPUT_POST,'code', FILTER_SANITIZE_STRING);
$discount = filter_input(INPUT_POST,'discount', FILTER_SANITIZE_NUMBER_INT);

} else {
    header('Location: ../manage_products.php');
}


//Validating Input data
if (empty($category)){
    header('Location: ../add_category.php?error=emptyfield');
} 

//adding to DB
$data=[
    'name' => $name,
    'status' => 1,
    'code' => $code,
    'discount' => $discount
 ];

$sql = "INSERT INTO `coupons` (status,name,code,discount) VALUES (:status,:name,:code,:discount)";
$stmt= $database->connection->prepare($sql);
$stmt->execute($data);


Header('Location: ../settings.php?status=couponAdded');
