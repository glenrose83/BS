<?php
session_start();
include_once '../bootstrap.php';
$database = new Database();

//Sanitizing and checking input from form
$typedUsername = filter_input(INPUT_POST,'username', FILTER_SANITIZE_STRING);
$typedPassword = filter_input(INPUT_POST,'password', FILTER_SANITIZE_STRING);

if(empty($typedPassword || $typedUsername)){
    header('Location: ../login.php?error=emptyfields');
    
} else {



        //Check user exist in database 
        $userData = $database->query("SELECT * FROM `users` where username='$typedUsername'");    

        if(!$userData){
          header('Location: ../login.php?error=wronguserorpassword');

        } else {

        
            //Checks password is correct  
            if(!password_verify($typedPassword, $userData['userpassword'])){ 
              header('Location: ../login.php?error=wronguserorpassword');
          
            } else {
              
            //All is successfull - getting shopdata
            var_dump($userData);


            //assigning sessionvalues
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = $typedUsername;
            $_SESSION['id'] = $userData['id'];
            $_SESSION['shopname'] = $userData['shopname'];
            $_SESSION['role'] = $userData['role'];
            User::$username = $typedUsername;
            header('Location: ../admin/index.php');
            }

        }    

}

 
 
 

