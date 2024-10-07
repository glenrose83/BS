<?php
session_start();
include_once '../../bootstrap.php';

//Getting the right DB
include '../../shops/'. $_SESSION['shopname'] .'/shop_db_class.php';

$database = new DatabaseShop;

//Checking users permission to see this
if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
} else {
    header('Location: ../login.php?error=pleaselogin');
}

//Checking and sanitizing user id
if(isset($_GET['id'])){
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
}



//Checking and sanitizing form data
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $companyname = filter_input(INPUT_POST,'companyname', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST,'address', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST,'city', FILTER_SANITIZE_STRING);
    $zip = filter_input(INPUT_POST,'zip', FILTER_SANITIZE_STRING);
    $country = filter_input(INPUT_POST,'country', FILTER_SANITIZE_STRING);
    $vat = filter_input(INPUT_POST,'vat', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST,'phone', FILTER_SANITIZE_NUMBER_INT);

    } else {
        header('Location: ../change_info.php');
    }


    //updating the DB
    $data=[      
        'id' => $id, 
        'companyname' => $companyname,
        'address' => $address,
        'zip' => $zip,
        'city' => $city,
        'country' => $country,
        'vat' => $vat,
        'email' => $email,
        'phone' => $phone
    ];
    
    $sql = "UPDATE `users`  SET companyname=:companyname, address=:address, zip=:zip, city=:city, country=:country, vat=:vat, email=:email, phone=:phone WHERE id=:id";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute($data);
    
    
    header('Location: ../settings.php?status=info_updated');

