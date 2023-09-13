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
    <meta name="description" content="Choose your shops template in Basic Webshop Administration">
    <title>Basic Webshop - Templates</title>
   
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
                        <h2>Templates</h2>
                    </div> 
                </div>

                <!--//Table with products-->
                <div class="row">
                <div class="col-md-8 custom-box">
                My info: <br>  
                 
                Company name
                name         
                test<br>
                password                   
                </div>

                <div class="col-md-3 custom-box">
                PICTURE                 
                </div>
                </div>


                <div class="row">
                <div class="col-md-8 custom-box">
                My info: <br>   
                Company name
                name         
                test<br>
                password                   
                </div>

                <div class="col-md-3 custom-box">
                PICTURE                          
                </div>
                </div>

                <div class="row">
                <div class="col-md-8 custom-box">
                My info: <br>   
                Company name
                name         
                test<br>
                password                   
                </div>

                <div class="col-md-3 custom-box">
                PICTURE                            
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


