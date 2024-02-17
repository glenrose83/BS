<?php
session_start();
include_once '../../includes/db_connection.php';

//Getting data for vat
    $stmt = $pdo->prepare(
    'SELECT * FROM vat;'
    );
    $stmt->execute();
    $vatOptions = $stmt->fetchALL();

//if array has more than one
    if(count($vatOptions) >= 1 ) {
        header('Location: ../settings.php?error=youCanOlyHaveOne');
        exit();
        
    } 


// //Checking and sanitizing input data
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$vat = filter_input(INPUT_POST,'vat', FILTER_SANITIZE_STRING);
$country = filter_input(INPUT_POST,'country', FILTER_SANITIZE_STRING);

} else {
    header('Location: ../settings.php');
}


//Validating Input data
if (empty($vat)){
    header('Location: ../settings.php?error=pleasefilloutfields');
} 

//adding to DB
$data=[
    'vat' => $vat,
    'country' => $country
 ];

$sql = "INSERT INTO vat (country,vat) VALUES (:country,:vat)";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);


Header('Location: ../settings.php?success=vatOptionAdded');
