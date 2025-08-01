<?php
session_start();

include_once '../bootstrap.php';

//Getting the right DB
include '../shops/'. $_SESSION['shopname'] .'/shop_db_class.php';

$database = new DatabaseShop;

//sanitize input
$fullname = filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_STRING);
$streetname = filter_input(INPUT_POST, 'streetname', FILTER_SANITIZE_STRING);
$housenumber = filter_input(INPUT_POST, 'housenumber', FILTER_SANITIZE_NUMBER_INT);
$etc = filter_input(INPUT_POST, 'etc', FILTER_SANITIZE_STRING);
$postcode = filter_input(INPUT_POST, 'postcode', FILTER_SANITIZE_NUMBER_INT);    
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
$country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$email_confirm = filter_input(INPUT_POST, 'email_confirm', FILTER_SANITIZE_STRING);

//Getting user IP
$ip = $_SERVER['REMOTE_ADDR'];
$ipTwo = $_SERVER['HTTP_CLIENT_IP'];
$ipThree = $_SERVER['HTTP_X_FORWARDED_FOR'];
$ipFour = getenv("REMOTE_ADDR");

//Getting user browser
$userBrowser = $_SERVER['HTTP_USER_AGENT'];



//Validating Input data
if (empty($fullname || $streetname || $housenumber || $etc  || $postcode || $city || $phone || $country || $email || $email_confirm)){
    header('Location: ../shops/basisit/checkout_design.php?error=missingfields');
    exit();
} 

if ($email !== $email_confirm){
   
    header('Location: ../shops/basisit/checkout_design.php?error=notsamepass');
    exit();
} 

//getting IP and useragent


//Inserting data to database
$data = [
    'fullname' => $fullname,
    'streetname' => $streetname,
    'housenumber' => $housenumber,
    'etc' => $etc,
    'postcode' => $postcode,
    'city' => $city,
    'phone' => $phone,
    'country' => $country,
    'email' => $email,
    'browser' => $userBrowser,
    'ip' => $ip,
    'iptwo' => $ipTwo,
    'ipthree' => $ipThree,
    'ipfour' => $ipFour

];
$sql = "INSERT INTO customers (fullname, streetname, housenr, etc, postcode, city, country, phone, email, browser, ip, iptwo, ipthree, ipfour) 
VALUES (:fullname, :streetname, :housenumber, :etc, :postcode, :city, :country, :phone, :email, :browser, :ip, :iptwo, :ipthree, :ipfour)";
$stmt= $database->connection->prepare($sql);
$stmt->execute($data);

//here we get the last inserted ID to use later in checkout proccess
$_SESSION['last_id'] = $database->lastInsertId();

header('Location: ../shops/basisit/delivery_design.php');
exit();
