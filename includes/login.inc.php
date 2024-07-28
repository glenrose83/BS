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
        $result = $database->query("SELECT * FROM `users` where username='$typedUsername'");    

        if(!$result){
          header('Location: ../login.php?error=wronguserorpassword');
        } else {

        
            //Checks password is correct  
            if(!password_verify($typedPassword, $result['userpassword'])){ 
              header('Location: ../login.php?error=wronguserorpassword');
          
            } else {
              
            //All is successfull
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = $typedUsername;
            $_SESSION['id'] = $result['id'];
            User::$username = $typedUsername;
            header('Location: ../admin/index.php');
            }

        }    

}

 
 
 

