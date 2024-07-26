<?php
session_start();
include_once '../../bootstrap.php'; 

//Check if user is logged in
User::isLoggedIn();

//intialising objects
$database = new Database;


// //Checking and sanitizing input data
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$category = filter_input(INPUT_POST,'category', FILTER_SANITIZE_STRING);
} else {
    header('Location: ../manage_products.php');
}


//Validating Input data
if (empty($category)){
    header('Location: ../add_category.php?error=emptyfield');
} 

$data=[
    'cat' => $category
 ];

$sql = "INSERT INTO `categories` (cat) VALUES (:cat)";
$stmt= $database->connection->prepare($sql);
$stmt->execute($data);


Header('Location: ../manage_categories.php?status=category_added');
