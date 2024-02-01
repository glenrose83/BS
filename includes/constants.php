<?php
 

    ////function that checks if data is  pulled and populated in constants
    if(!defined('GA4STATUS')){
     
        //Getting data
        $stmt = $pdo->prepare("SELECT * FROM tracking WHERE name='ga4'");
        $stmt->execute(); 
        $userSettings = $stmt->fetch();

        //Declaring constants
        define("GA4STATUS", $userSettings['status']);  
        define("GA4CODE", $userSettings['code']);  
    
       
    } 

    





    

    
    
  

    

          






