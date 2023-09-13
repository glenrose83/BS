<?php
session_start();

if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
} else {
    header('Location: ../login.php?error=pleaselogin');
}

include_once '../bootstrap.php'; 

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Set your settings in Basic Webshop Administration">
    <title>Basic Webshop - Change Password</title>
   
  <!--adding bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!--adding my own style-->
   <link rel="stylesheet" href="css/mystyle.css">
</head>


<body>
<div class="container-fluid height">
    <div class="row height">

        <div class="col-md-3 admin-menu">
            <?php include_once 'includes/menu.php' ?>
        </div>

        <div class="col-md-9 "> 

            <div class="container-fluid">
                      
                <div class="row">
                    <div class="col-md-12">
                        <h1>Administration</h1>
                        <h2>Change password</h2>
                    </div> 
                </div>

            
                <!--//Table with products-->
                <div class="row">
                    <div class="col-md-12 custom-box">
                        <span class="fs-6 fw-light text-danger"> NOTICE - You are about to change your password</span><br><br>
                        <?php if($_POST['status']="no-match"){    echo "<span class='fs-6 fw-light text-danger'>You have not typed the same password in both fields.... Try again</span><br>"; }?>

                    <form action="includes/change_password.inc.php" method="POST">
                        <span class="fs-6 fw-light">Type your NEW password:  </span><br><input type="password" name="pwd1"></input><br><br>
                        
                        <span class="fs-6 fw-light">Type your NEW password again: </span><br><input type="password" name="pwd2"></input><br><br>
                        
                        <button type="submit">Change Password</button>

                    </div>  
                </div>

                
                 
            </div>                  


        </div>


        
    </div>
</div>

<!--Javascript and stuff-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>
