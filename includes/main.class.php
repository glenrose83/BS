<?php

class Main{
    
        
    //get data from server
    public function getData(){
          
        $code = "    
        <!-- Google tag (gtag.js) -->
        <script async src='https://www.googletagmanager.com/gtag/js?id=".GA4CODE."'></script>
        <script>            
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '".GA4CODE."');
        </script>";
        return $code;
    }    

    
}