<?php
session_start();
include_once '../../bootstrap.php';

//Test if both fields is set
if(isset($_POST['pwd1']) AND isset($_POST['pwd2'])){

    //Test if both fields match
    if($_POST['pwd1'] != $_POST['pwd2']){
    header('Location: ../change_password.php?status=no_match');
    }

    //hash password
    $pwd = filter_input(INPUT_POST,'pwd1', FILTER_SANITIZE_STRING);
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);



    //updating the DB

    $data=[
        'set' =>    $pwd 
    ];
    
    $sql = "UPDATE users SET userpassword=:set";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
    

    header('Location: ../settings.php?status=password_updated');

}
