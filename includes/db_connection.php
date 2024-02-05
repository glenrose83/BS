<?php

if(isset($_SESSION['username'])){
    
    //if constant is defined
    if(defined('DATABASENAME')){

        //Assigning to varibles
        $databasename = DATABASENAME;
        $databaseuser = DATABASEUSER;
        $databasepwd =  DATABASEPWD; 

  
        //Setting user DB
        $host = 'localhost';
        $db   = $databasename;
        $user = $databaseuser;
        $pass = $databasepwd;

        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);

    } else {

        //download db info for that user
        $host = 'localhost';
        $db   = 'bs';
        $user = 'root';
        $pass = '';
        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);

        $data=[
            'user' => $_SESSION['username']    
        ];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:user");
        $stmt->execute($data);
        $userDetails = $stmt->fetch();

        //if is array so we check it found username
        

        //Assign to constants
        define("DATABASENAME", $userDetails['databasename']);  
        define("DATABASEUSER", $userDetails['databaseuser']);  
        define("DATABASEPWD", $userDetails['databasepwd']);  
        define("EMAIL", $userDetails['email']);  
        define("SHOPNAME", $userDetails['shopname']);  

    

        //Assigning to varibles
        $databasename = DATABASENAME;
        $databaseuser = DATABASEUSER;
        $databasepwd =  DATABASEPWD; 

    
        //Setting user DB
        $host = 'localhost';
        $db   = $databasename;
        $user = $databaseuser;
        $pass = $databasepwd;

        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);
    }



 
 
 } else{
    header('Location: ../login.php?error=pleaselogin');
}
 
