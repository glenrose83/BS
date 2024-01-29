<?php
include_once '../bootstrap.php';
include_once '../standard_database.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

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
include_once '../../includes/constants.php';
include_once '../../includes/main.class.php';
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



//Copying image files 
$file = '../shops/standard/img/black-shirt.png'; 
$newfile = '../shops/'.$shopName.'/img/black-shirt.png';
copy($file, $newfile);

$file = '../shops/standard/img/computer.png'; 
$newfile = '../shops/'.$shopName.'/img/computer.png';
copy($file, $newfile);

$file = '../shops/standard/img/fryingpan.png'; 
$newfile = '../shops/'.$shopName.'/img/fryingpan.png';
copy($file, $newfile);

$file = '../shops/standard/img/handsker.jpg'; 
$newfile = '../shops/'.$shopName.'/img/handsker.jpg';
copy($file, $newfile);

$file = '../shops/standard/img/kitchen_machine.png'; 
$newfile = '../shops/'.$shopName.'/img/kitchen_machine.png';
copy($file, $newfile);

$file = '../shops/standard/img/laptop.png'; 
$newfile = '../shops/'.$shopName.'/img/laptop.png';
copy($file, $newfile);

$file = '../shops/standard/img/multiple-tshirts.png'; 
$newfile = '../shops/'.$shopName.'/img/multiple-tshirts.png';
copy($file, $newfile);

$file = '../shops/standard/img/computerimg.jpg'; 
$newfile = '../shops/'.$shopName.'/img/computerimg.jpg';
copy($file, $newfile);

$file = '../shops/standard/img/phones.jpg'; 
$newfile = '../shops/'.$shopName.'/img/phones.jpg';
copy($file, $newfile);

$file = '../shops/standard/img/red-dress.png'; 
$newfile = '../shops/'.$shopName.'/img/red-dress.png';
copy($file, $newfile);

$file = '../shops/standard/img/running_shoe.jpg'; 
$newfile = '../shops/'.$shopName.'/img/running_shoe.jpg';
copy($file, $newfile);

$file = '../shops/standard/img/shoe.jpg'; 
$newfile = '../shops/'.$shopName.'/img/shoe.jpg';
copy($file, $newfile);

$file = '../shops/standard/img/skab.jpg'; 
$newfile = '../shops/'.$shopName.'/img/skab.jpg';
copy($file, $newfile);

$file = '../shops/standard/img/studio_monitor.jpg'; 
$newfile = '../shops/'.$shopName.'/img/studio_monitor.jpg';
copy($file, $newfile);

$file = '../shops/standard/img/studio_monitor_1.jpg'; 
$newfile = '../shops/'.$shopName.'/img/studio_monitor_1.jpg';
copy($file, $newfile);

$file = '../shops/standard/img/studio_monitor_2.jpg'; 
$newfile = '../shops/'.$shopName.'/img/studio_monitor_2.jpg';
copy($file, $newfile);

$file = '../shops/standard/img/studio_monitor_3.jpg'; 
$newfile = '../shops/'.$shopName.'/img/studio_monitor_3.jpg';
copy($file, $newfile);

$file = '../shops/standard/img/temperature.png'; 
$newfile = '../shops/'.$shopName.'/img/temperature.png';
copy($file, $newfile);

$file = '../shops/standard/img/termperature_1.png'; 
$newfile = '../shops/'.$shopName.'/img/termperature_1.png';
copy($file, $newfile);

$file = '../shops/standard/img/wall_clock.png'; 
$newfile = '../shops/'.$shopName.'/img/wall_clock.png';
copy($file, $newfile);

$file = '../shops/standard/img/watch.png'; 
$newfile = '../shops/'.$shopName.'/img/watch.png';
copy($file, $newfile);

$file = '../shops/standard/img/white_shoe.png'; 
$newfile = '../shops/'.$shopName.'/img/white_shoe.png';
copy($file, $newfile);

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.sendgrid.net';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'apikey';                     //SMTP username
    $mail->Password   = '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';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('contact@basisit.net', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addReplyTo('contact@basisit.net', 'Information');
    $mail->addBCC('contact@basisit.net');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Welcome to your new webshop';
    $mail->Body    = 'Hi and welcome to your new shop <b>in bold!</b><br>Here is your username and password.<br>
    username: xxxxx<br>
    password: xxxxxx<br><br>
    www.basicwebshop.net/admin';
    $mail->AltBody = 'this is your sign in';

    $mail->send();
    Header('Location: ../admin/index.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

