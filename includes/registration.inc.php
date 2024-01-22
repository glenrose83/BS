<?php
include_once '../bootstrap.php';
include_once '../standard_database.php';

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
 $data = [
    'username' => $userName,
    'shopname' => $shopName,
    'useremail' => $userEmail,
    'password' => $hashedPassword,
    'role' => $role
];
$sql = "INSERT INTO users (username, userpassword, email, shopname, role) VALUES (:username, :password, :useremail, :shopname, :role)";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);



// statement to create unique database for induvidal shop
$number = + rand(121251111, 21564894218951999);
$uniqueDB = $shopName. "_". $number;

// create unqiue username & Password
$uniqueName = $userName. "_". $number; 
$pass = "JayFooD_". rand(200,9999);
echo "password is: ".$pass;
echo "username is: ".$uniqueName;
echo "database is: ".$uniqueDB;



//Creating database
$sql = "CREATE DATABASE $uniqueDB";
$stmt= $pdo->prepare($sql);
$stmt->execute();

// Creating user in DB
$sql = "CREATE USER '" . $uniqueName . "'@'localhost' IDENTIFIED BY '" . $pass . "' ";
$stmt= $pdo->prepare($sql);
$stmt->execute();

// Creating user in DB
$sql = "GRANT SELECT, INSERT, UPDATE, DELETE ON ".$uniqueDB.".* TO '".$uniqueName."'@'localhost'";
$stmt= $pdo->prepare($sql);
$stmt->execute();


// Creating folder for the shop for new user
$dirPath = '../shops/' . $shopName;
if (!mkdir($dirPath, 0777, true)) {
    die('Failed to create directories...');
}

// Creating folder for the img in the shop for new user
$dirPath = '../shops/' . $shopName. '/img';
if (!mkdir($dirPath, 0777, true)) {
    die('Failed to create directories...');
}

// Creating DB file
$p="";
$filepath = "../shops/" . $shopName . "/db.php";
$index = fopen($filepath, "w") or die("unable to create file");
$text = "
<?php
    \$host = 'localhost';
    \$db   = 'bs';
    \$user = 'root';
    \$pass = '';
    \$dsn = \"mysql:host=\$host;dbname=\$db\";
    \$pdo = new PDO(\$dsn, \$user, \$pass);
    \$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
";
    
fwrite($index, $text);
fclose($index); 


//creating bootstrap.php
$filepath = "../shops/" . $shopName . "/bootstrap.php";
$index = fopen($filepath, "w") or die("unable to create file");
$text = "
<?php
include_once 'db.php';
include_once '../../functions/cart_functions.php';
";

fwrite($index, $text);
fclose($index); 

//Creating index file 
$filepath = "../shops/" . $shopName . "/index.php";
$index = fopen($filepath, "w") or die("unable to create file");
$text = "
<?php
include_once '../standard/index.php';
";

fwrite($index, $text);
fclose($index); 


//Closing previous connection
$stmt = null;


//Import standard database
$host = '127.0.0.1';
$db   = $uniqueDB;
$user = 'root';
$pass = '';


$dsn = "mysql:host=$host;dbname=$db";
$pdo = new PDO($dsn, $user, $pass);

//Statement to import the database tables
$stmt= $pdo->prepare($standardDatabase);
$stmt->execute();

Header('Location: ../admin/index.php');

//Logs new user in
//session_start();
   // $_SESSION['loggedin'] = true;
    // $_SESSION['username'] = $user['username'];





