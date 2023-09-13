<?php
include_once '../../bootstrap.php';


// //Checking and sanitizing input data
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $shopname = filter_input(INPUT_POST,'shopname', FILTER_SANITIZE_STRING);
    $companyname = filter_input(INPUT_POST,'companyname', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST,'address', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST,'city', FILTER_SANITIZE_STRING);
    $country = filter_input(INPUT_POST,'country', FILTER_SANITIZE_STRING);
    $vat = filter_input(INPUT_POST,'vat', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST,'phone', FILTER_SANITIZE_NUMBER_INT);

    } else {
        header('Location: ../settings.php');
    }


    //updating the DB
    $data=[
        'shopname' => $shopname,
        'companyname' => $companyname,
        'address' => $address,
        'city' => $city,
        'country' => $country,
        'vat' => $vat,
        'email' => $email,
        'phone' => $phone
    ];
    
    $sql = "UPDATE users SET shopname=:shopname, companyname=:companyname, address=:address, city=:city, country=:country, vat=:vat, email=:email, phone=:phone ";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
    
    echo "done updating";
    //header('Location: ../settings.php?status=info_updated');

