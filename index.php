<?php
include_once 'bootstrap.php';

if(isset($_GET['case'])){
    if($_GET['case'] == "done"){
        $status = "<font color='#008000' size='24px'><b>SUPER! ---> You have been signed up</b></font><p><br></p>";
    } else {
        $status = "<font color='#FF0000' size='24px'><b>Oh No  ---> Please fill out the email field</b></font><p><br></p>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free Webshop To The People">
    <title>Basic Webshop</title>
    
   <!--adding my own style-->
   <link rel="stylesheet" href="css/customStyle.css">
    <!--adding bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
   
</head>





<body>

<div class="container-fluid height">
    <div class="row height">

        <div class="col-md-12 custom-invite">
            <center>
                <img src="img/Early-bird-message.jpg">
            <h1>Be the first to get access to the <br>free webshop system</h1><br><p><br></p>
             <h3>Only limited users in the start. <br><p><br></p>
             Sign up with your email, <br> and get an email with your invitation when the system is ready</h3>
            
            <p><br></p>
            <?php if(isset($status)) { echo $status;} ?>

            <form action="signed_up.php" method="POST">
            <input type="text" name="username" placeholder="Username"></input><br>
            <input type="email" name="email" placeholder="email"></input><br><br>
            <button type="submit">YES! Let me try the shop</button>
            </form>
            </center>
        </div>

       
        
    </div>
</div>
<!--Javascript used by bootstrap-->
<script src="js/bootstrap.bundle.min.js"></script>    
</body>
</html>




