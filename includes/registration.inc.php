<?php
ob_start();
session_start();
session_unset();
session_destroy();
include_once '../bootstrap.php';
$database = new Database();

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';


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

    //Saving in session for use in sending email
    $_SESSION['username'] = $userName;
    $_SESSION['shopname'] = $shopName;
    $_SESSION['useremail'] = $userEmail;
    $_SESSION['pwd'] = $passwordOne;
    
    //Hashing password
    $hashedPassword = password_hash($passwordOne, PASSWORD_DEFAULT);
    
    

    
    
    
    // statement to create unique database for induvidal shop
    $number = + rand(121251111, 21564894218951999);
    $uniqueDBwithSpace = $shopName. "_". $number;
    $uniqueDB = str_replace(' ','', $uniqueDBwithSpace);

    
    // create unqiue username & Password
    $uniqueNameWithspaces = $userName. "_". $number; 
    $uniqueName = str_replace(' ','', $uniqueNameWithspaces);
    $pass = "JayFooD_". rand(200,9999);


    // Inserting create user in master DB 
        $data = [
            'username' => $userName,
            'shopname' => $shopName,
            'useremail' => $userEmail,
            'password' => $hashedPassword,
            'database' => $uniqueDB,
            'dbusername' => $uniqueName,
            'databasepwd' => $pass,
            'role' => $role
        ];
    $sql = "INSERT INTO users (username, userpassword, email, shopname, role, databasename, databaseuser, databasepwd) 
    VALUES (:username, :password, :useremail, :shopname, :role, :database, :dbusername, :databasepwd)";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute($data);

    
    
    
    //Creating database
    $stmt = $database->connection->prepare("CREATE DATABASE $uniqueDB");
    $stmt->execute();

    
    
    // Creating user in DB
    $stmt = $database->connection->prepare("CREATE USER '" . $uniqueName . "'@'localhost' IDENTIFIED BY '" . $pass . "' ");
    $stmt->execute();
    
    // Creating user in DB
    $sql = "GRANT ALL PRIVILEGES ON ".$uniqueDB.".* TO '".$uniqueName."'@'localhost'";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute();
    
    
    // Creating folder for the shop for new user, but remove spaces
    $shopNameFolder= str_replace(' ','', $shopName);

    //creating the shopfolder
    $dirPath = '../shops/' . $shopNameFolder;
    if (!mkdir($dirPath, 0777, true)) {
        die('Failed to create directories...');
    }
    
    // Creating folder for the img in the shop for new user
    $dirPath = '../shops/' . $shopNameFolder. '/img';
    if (!mkdir($dirPath, 0777, true)) {
        die('Failed to create directories...');
    }
    
    // Creating DB file
    $p="";
    $filepath = "../shops/" . $shopNameFolder . "/shop_db_class.php";
    $index = fopen($filepath, "w") or die("unable to create file");
    $text = "
        <?php 
        class DatabaseShop {

            public \$connection;

            private \$servername = 'localhost';
            private \$username = '$uniqueName';
            private \$password = '$pass';
            private \$databasename = '$uniqueDB';
            

            public function __construct() {


                try {
                    \$this->connection = new PDO(\"mysql:host=\$this->servername;dbname=\$this->databasename\", \$this->username, \$this->password);
                    // set the PDO error mode to exception
                    \$this->connection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                } catch(PDOException \$e) {
                    echo 'Connection failed: ' . \$e->getMessage();
                }
            }
        }
    ";
        
    fwrite($index, $text);
    fclose($index); 
    
    

    //creating bootstrap.php (shop_db_class.php changes in each shop, therefore own shop folder)
    $filepath = "../shops/" . $shopNameFolder . "/bootstrap.php";
    $index = fopen($filepath, "w") or die("unable to create file");
    $text = "
    <?php
    include_once 'shop_db_class.php';
    include_once '../../functions/cart_functions.php';
    include_once '../../includes/constants.php';
    include_once '../../includes/main.class.php';
    ";
    
    fwrite($index, $text);
    fclose($index); 
    
    //Creating index file 
    $filepath = "../shops/" . $shopNameFolder . "/index.php";
    $index = fopen($filepath, "w") or die("unable to create file");
    $text = "
    <?php
    include_once '../standard/index.php';
    ";
    
    fwrite($index, $text);
    fclose($index); 
    
    //Creating cart file 
    $filepath = "../shops/" . $shopNameFolder . "/cart.php";
    $index = fopen($filepath, "w") or die("unable to create file");
    $text = "
    <?php
    include_once '../standard/cart.php';
    ";
    fwrite($index, $text);
    fclose($index); 


     //Creating checkout file 
      $filepath = "../shops/" . $shopNameFolder . "/checkout_design.php";
      $index = fopen($filepath, "w") or die("unable to create file");
      $text = "
      <?php
      include_once '../standard/checkout_design.php';
      ";
      fwrite($index, $text);
      fclose($index); 

      //Creating delivery file 
      $filepath = "../shops/" . $shopNameFolder . "/delivery_design.php";
      $index = fopen($filepath, "w") or die("unable to create file");
      $text = "
      <?php
      include_once '../standard/delivery_design.php';
      ";
      fwrite($index, $text);
      fclose($index); 

    //Creating order completed file 
    $filepath = "../shops/" . $shopNameFolder . "/order_completed_design.php";
    $index = fopen($filepath, "w") or die("unable to create file");
    $text = "
    <?php
    include_once '../standard/order_completed_design.php';
    ";
    fwrite($index, $text);
    fclose($index); 

    
    //Creating payment design file 
    $filepath = "../shops/" . $shopNameFolder . "/payment_design.php";
    $index = fopen($filepath, "w") or die("unable to create file");
    $text = "
    <?php
    include_once '../standard/payment_design.php';
    ";
    fwrite($index, $text);
    fclose($index); 

    
    //Closing previous connection
    $stmt = null;
    
    
    //Import standard database and inizialation of the Shops Database-conenction   
        include_once "../shops/$shopNameFolder"   . "/shop_db_class.php";
        include_once '../shops/standard/standard_database.php';

        $databaseShop = new DatabaseShop;
        $stmt = $databaseShop->connection->prepare($standardDatabase);
        $stmt->execute();


        
        
                 
    
    
    
    //Copying image files 
    $file = '../shops/standard/img/black-shirt.png'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/black-shirt.png';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/computer.png'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/computer.png';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/fryingpan.png'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/fryingpan.png';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/handsker.jpg'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/handsker.jpg';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/kitchen_machine.png'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/kitchen_machine.png';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/laptop.png'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/laptop.png';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/multiple-tshirts.png'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/multiple-tshirts.png';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/computerimg.jpg'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/computerimg.jpg';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/phones.jpg'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/phones.jpg';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/red-dress.png'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/red-dress.png';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/running_shoe.jpg'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/running_shoe.jpg';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/shoe.jpg'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/shoe.jpg';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/skab.jpg'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/skab.jpg';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/studio_monitor.jpg'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/studio_monitor.jpg';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/studio_monitor_1.jpg'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/studio_monitor_1.jpg';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/studio_monitor_2.jpg'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/studio_monitor_2.jpg';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/studio_monitor_3.jpg'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/studio_monitor_3.jpg';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/temperature.png'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/temperature.png';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/termperature_1.png'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/termperature_1.png';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/wall_clock.png'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/wall_clock.png';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/watch.png'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/watch.png';
    copy($file, $newfile);
    
    $file = '../shops/standard/img/white_shoe.png'; 
    $newfile = '../shops/'.$shopNameFolder.'/img/white_shoe.png';
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
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('contact@basisit.net', 'Basic Webshop');
    $mail->addAddress($userEmail, 'Basic Webshop');     //Add a recipient
    $mail->addReplyTo('contact@basisit.net', 'Basic Webshop');
    $mail->addBCC('contact@basisit.net');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Welcome to your new webshop';
    $mail->Body    = 'Hi and welcome to your new shop 
    <br>Here is your username and password.<br><br>
    Username: '.$userName.'<br>
    Shopname: '.$shopName.'<br>
    Password: '.$passwordOne.'<br><br>
    <a href="www.basicwebshop.net/admin">Log in to admin panel here</a><br>
    <a href="www.basicwebshop.net/shop"'.$shopNameFolder.'>See your website here</a>';


    $mail->AltBody = 'Hi and welcome to your new shop 
    <br>Here is your username and password.<br><br>
    Username: '.$userName.'<br>
    Shopname: '.$shopName.'<br>
    Password: '.$passwordOne.'<br><br>
    <a href="www.basicwebshop.net/admin">Log in to admin panel here</a><br>
    <a href="www.basicwebshop.net/shop"'.$shopNameFolder.'>See your website here</a>';



    $mail->send();
    Header('Location: ../admin/index.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

