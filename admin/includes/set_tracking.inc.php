<?php
include_once '../../includes/db_connection.php';


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
    'tracking' => $tracking
 ];

$sql = "UPDATE users SET ga4tracking=:tracking, ga4status=1";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);


Header('Location: ../settings.php?success=trackingCodeAdded');
