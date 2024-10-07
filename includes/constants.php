<?php

//Getting the right DB
include '../shops/'. $_SESSION['shopname'] .'/shop_db_class.php';

$database = new DatabaseShop;
 

    ////function that checks if data is  pulled and populated in constants
    if(!defined('GA4STATUS')){
     
        //Getting data
        $stmt = $database->connection->prepare("SELECT * FROM tracking WHERE name='ga4'");
        $stmt->execute(); 
        $userSettings = $stmt->fetch();

        //Declaring constants
        define("GA4STATUS", $userSettings['status']);  
        define("GA4CODE", $userSettings['code']);  
    
       
    } 

    





    

    
    
  

    

          






