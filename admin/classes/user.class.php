<?php

class User {

    public static $username;

    public static function isLoggedIn(){
        if($_SESSION['loggedin'] == TRUE && isset($_SESSION['username'])){
                   
        } else {
                header('Location: ../login.php?error=pleaselogin');
        
        }
    }


}