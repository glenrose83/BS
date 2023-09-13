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
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
    <title>Responsive Side Menu &ndash; Layout Examples &ndash; Pure</title>
    

    <!--adding bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
            <div class="header custom-pagetitle">
            
            
            

            <!--Site content-->
            <div class="container-fluid">
                <div class="row">
                        <div class="col-md-10">
                        <h1>Administration<br></h1>
                        </div>
                    
                       
                        <div class="col-md-2 custom-box">
                            <a href="orders.php">    
                        <svg class="bi" width="32" height="32" fill="currentColor">
                        <use xlink:href="bootstrap-icons.svg#cash-coin"/>
                        </svg> <br>    
                        View Orders
                        </div>
                        </a>

                         
                        <div class="col-md-2 custom-box">
                            <a href="add_product.php">   
                        <svg class="bi" width="32" height="32" fill="currentColor">
                        <use xlink:href="bootstrap-icons.svg#file-earmark-plus"/>
                        </svg> <br>
                        Create a product 
                        </div>
                        </a>
                        
                        
                        <div class="col-md-2 custom-box">
                            <a href="manage_products.php">    
                        <svg class="bi" width="32" height="32" fill="currentColor">
                        <use xlink:href="bootstrap-icons.svg#pencil-square"/>
                        </svg> <br>
                        Show Products
                        </div>
                        </a>
                        
                        <div class="col-md-2 custom-box">
                        <svg class="bi" width="32" height="32" fill="currentColor">
                        <use xlink:href="bootstrap-icons.svg#bar-chart-line"/>
                        </svg> <br>
                        Show sales(Comming Soon)
                        </div>
                        
                        
                        <div class="col-md-2 custom-box">
                        <a href="logout.inc.php">    
                        <svg class="bi" width="32" height="32" fill="currentColor">
                        <use xlink:href="bootstrap-icons.svg#box-arrow-right"/>
                        </svg> <br>
                        Logout
                        </div>
                        </a>
                    
                </div>
                
                <div class="row">
                    <div class="col-md-3 custom-main-box-v1">
                    You have <?php echo findPendingOrders($pdo); ?> orders pending...
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 custom-main-box">
                    Most Popular Products
                    </div>

                    <div class="col-md-5 custom-main-box">
                    Sales today
                    
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 custom-main-box">
                    Total this year   
                    </div>

                    <div class="col-md-5 custom-main-box">
                    Sales this week / month
                     
                    </div>
                </div>



        </div>
        
    </div>
</div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
</body>
</html>