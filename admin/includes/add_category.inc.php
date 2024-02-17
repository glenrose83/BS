<?php
session_start();
include_once '../../includes/db_connection.php';

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

$sql = "INSERT INTO categories (cat) VALUES (:cat)";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);


Header('Location: ../manage_categories.php?status=category_added');
