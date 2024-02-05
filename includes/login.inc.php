<?php
  session_start();

  //Sanitizing and checking input from form
$typedUsername = filter_input(INPUT_POST,'username', FILTER_SANITIZE_STRING);
$typedPassword = filter_input(INPUT_POST,'password', FILTER_SANITIZE_STRING);

if(empty($typedPassword || $typedUsername)){
    header('Location: ../login.php?error=emptyfields');
}

  $_SESSION['loggedin'] = TRUE;
  $_SESSION['username'] = $typedUsername;

  //Getting user from DB
/* $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:typedusername");
$stmt->execute(['typedusername' => $typedUsername]); 
$user = $stmt->fetch(); */

include_once '../bootstrap.php';







//Checking typed password vs. DB
//if(password_verify($typedPassword, $user['userpassword'])){
  
//} else {
  //  header('Location: ../login.php?error=wrongpassword');
//}



header('Location: ../admin/index.php');