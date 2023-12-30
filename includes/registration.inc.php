<?php
include_once '../bootstrap.php';

// Checking and sanitizing input data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$userName = filter_input(INPUT_POST,'userName', FILTER_SANITIZE_STRING);
$shopName = filter_input(INPUT_POST,'shopName', FILTER_SANITIZE_STRING);
$userEmail = filter_input(INPUT_POST,'userEmail', FILTER_SANITIZE_EMAIL);
$passwordOne = filter_input(INPUT_POST,'passwordOne', FILTER_SANITIZE_STRING);
$passwordTwo = filter_input(INPUT_POST,'passwordTwo', FILTER_SANITIZE_STRING);
$role= "admin";
}

//if shopname exists return to frontpage again



//Validating Input data
if (empty($userName || $shopName || $userEmail || $passwordOne || $passwordTwo)){
    header('Location: ../register.php?error=emptyfields');
} elseif  ($passwordOne !== $passwordTwo){
    header('Location: ../register.php?error=passwordmatch');
}

$hashedPassword = password_hash($passwordOne, PASSWORD_DEFAULT);


// Inserting data to database
// $data = [
//     'username' => $userName,
//     'shopname' => $shopName,
//     'useremail' => $userEmail,
//     'password' => $hashedPassword,
//     'role' => $role,
// ];
// $sql = "INSERT INTO users (username, userpassword, email, shopname, role) VALUES (:username, :password, :useremail, :shopname, :role)";
// $stmt= $pdo->prepare($sql);
// $stmt->execute($data);


// Creating files and folders for new user
$dirPath = '../shops/' . $shopName;
if (!mkdir($dirPath, 0777, true)) {
    die('Failed to create directories...');
}


// Will this be used?
// $filepath = "../shops/" . $shopName . "/index.php";
// $index = fopen($filepath, "w") or die("unable to create file");
// $text = "This shop belongs to" . $shopName;
// fwrite($index, $text);
// fclose($index); 


// Will this be used?
// $filepath = "../shops/" . $shopName . "/cart.php";
// $index = fopen($filepath, "w") or die("unable to create file");
// $text = "this is carttext";
// fwrite($index, $text);
// fclose($index); 

// statement to create database for induvidal shop
$number = + rand(121251111, 21564894218951999);
$uniqueDB = $shopName. "_". $number;

// $sql = "CREATE DATABASE $uniqueDB";
// $stmt= $pdo->prepare($sql);
// $stmt->execute();

// create unqiue username & Password
$uniqueName = $userName. "_". $number; 
$pass = "JaYfooD_". rand(200,9999);


// Creating user in DB
// $sql = "CREATE USER '" . $uniqueName . "'@'localhost' IDENTIFIED BY '" . $pass . "' ";
// $stmt= $pdo->prepare($sql);
// $stmt->execute();

// Creating user in DB
// $sql = "GRANT SELECT, INSERT, UPDATE, DELETE ON ".$unique.".* TO '".$uniqueName."'@'localhost'";
// $stmt= $pdo->prepare($sql);
// $stmt->execute();

// Creating DB file
$p="";
$filepath = "../shops/" . $shopName . "/db.php";
$index = fopen($filepath, "w") or die("unable to create file");
$text = '  
    <?php
    $host = '127.0.0.1'';
    
fwrite($index, $text);
fclose($index); 


//creating bootstrap.php
$filepath = "../shops/" . $shopName . "/bootstrap.php";
$index = fopen($filepath, "w") or die("unable to create file");
$text = "
<?php
include_once 'includes/db_connection.php';
include_once 'functions/cart_functions.php';
include_once 'admin/functions/admin_functions.php';
include_once 'admin/functions/edit_product_functions.php';

//classes that must be used in autoloader
include_once 'admin/classes/db.class.php';
include_once 'admin/classes/handle_order.class.php';
include_once 'admin/classes/settings.class.php'";
fwrite($index, $text);
fclose($index); 


//Import standard database




//Logs new user in
session_start();
   // $_SESSION['loggedin'] = true;
    //$_SESSION['username'] = $user['username'];




//Header('Location: ../admin/index.php');
