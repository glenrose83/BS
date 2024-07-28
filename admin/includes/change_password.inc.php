<?php
session_start();
include_once '../../bootstrap.php';
$database = new Database;


//Test if both fields is set
if(isset($_POST['pwd1']) AND isset($_POST['pwd2'])){

    //Test if both fields match
    if($_POST['pwd1'] != $_POST['pwd2']){
    header('Location: ../change_password.php?status=no_match');
    }

    //Filter inputs from POST method and GET method
    $pwd = filter_input(INPUT_POST,'pwd1', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    //hashing password
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    
    //updating the DB
    $data=[
        'set' => $pwd,
        'id' => $id
    ];
    
    $sql = "UPDATE `users` SET userpassword=:set WHERE id=:id";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute($data);
    

    header('Location: ../settings.php?status=password_updated');

}
