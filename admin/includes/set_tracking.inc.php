<?php
session_start();
include_once '../../bootstrap.php';
$database = new Database;


// //Checking and sanitizing input data
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$tracking = filter_input(INPUT_POST,'tracking', FILTER_SANITIZE_STRING);

} else {
    header('Location: ../settings.php');
}


//Validating Input data
if (empty($tracking)){
    header('Location: ../settings.php?error=pleasefilloutfields');
} 

//adding to DB
$data=[
    'tracking' => $tracking,
    'enable' => 1
 ];

$sql = "UPDATE `tracking` SET code=:tracking, status=:enable WHERE id=1";
$stmt= $database->connection->prepare($sql);
$stmt->execute($data);


Header('Location: ../settings.php?success=trackingCodeAdded');
