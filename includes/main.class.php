<?php

class Main{
    
    public $ga4code;

        
    //get data from server
    public function getData(){
        global $pdo;
        
        $stmt = $pdo->prepare("SELECT * FROM users");
        $stmt->execute(); 
        $product = $stmt->fetch();

        $this->ga4code = $product['ga4tracking'];
   
        $code = "    
        <!-- Google tag (gtag.js) -->
        <script async src='https://www.googletagmanager.com/gtag/js?id=".$this->ga4code."'></script>
        <script>            
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '".$this->ga4code."');
        </script>";
        return $code;
    }    

    
}