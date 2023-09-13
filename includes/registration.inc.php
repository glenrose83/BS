<?php
include_once '../bootstrap.php';

// //Checking and sanitizing input data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$userName = filter_input(INPUT_POST,'userName', FILTER_SANITIZE_STRING);
$shopName = filter_input(INPUT_POST,'shopName', FILTER_SANITIZE_STRING);
$userEmail = filter_input(INPUT_POST,'userEmail', FILTER_SANITIZE_EMAIL);
$passwordOne = filter_input(INPUT_POST,'passwordOne', FILTER_SANITIZE_STRING);
$passwordTwo = filter_input(INPUT_POST,'passwordTwo', FILTER_SANITIZE_STRING);
$role= "admin";
}


//Validating Input data
if (empty($userName || $shopName || $userEmail || $passwordOne || $passwordTwo)){
    header('Location: ../register.php?error=emptyfields');
} elseif  ($passwordOne !== $passwordTwo){
    header('Location: ../register.php?error=passwordmatch');
}

$hashedPassword = password_hash($passwordOne, PASSWORD_DEFAULT);


//Inserting data to database
$data = [
    'username' => $userName,
    'shopname' => $shopName,
    'useremail' => $userEmail,
    'password' => $hashedPassword,
    'role' => $role,
];
$sql = "INSERT INTO users (username, userpassword, email, shopname, role) VALUES (:username, :password, :useremail, :shopname, :role)";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);


//Creating files and folders for new user
$dirPath = '../shops/' . $shopName;
if (!mkdir($dirPath, 0777, true)) {
    die('Failed to create directories...');
}

$filepath = "../shops/" . $shopName . "/index.php";
$index = fopen($filepath, "w") or die("unable to create file");
$text = "This shop belongs to" . $shopName;
fwrite($index, $text);
fclose($index); 

$filepath = "../shops/" . $shopName . "/cart.php";
$index = fopen($filepath, "w") or die("unable to create file");
$text = "this is carttext";
fwrite($index, $text);
fclose($index); 

//Logs new user in
session_start();
   // $_SESSION['loggedin'] = true;
    //$_SESSION['username'] = $user['username'];

Header('Location: ../admin/index.php');
