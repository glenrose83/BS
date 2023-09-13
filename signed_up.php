<?php
include 'bootstrap.php';

if(!empty($_POST['email'])){
    $username = filter_input(INPUT_POST,'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);

    $data = [
        'username' => $username,
        'email' => $email,
    ];
    $sql = "INSERT INTO signup (username, email) VALUES (:username, :email)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);

    header('Location: index.php?case=done');


} else {
    header('Location: index.php?case=missing'); 
}