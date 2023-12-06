<?php
session_start();

if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
} else {
    header('Location: ../login.php?error=pleaselogin');
}

include_once '../bootstrap.php'; 

//get username and shop fra database where $_seesion = username

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
    <link rel="stylesheet" href="../css/mystyle.css">

   
</head>





<body>

<!--div nedenfor laver scrool horzintol-->
<div class="container-fluid full_size divbottombg">
<div class="topbg"></div>

    <div class="row">

        <!--menu-->
        <div class="col-md-3">
            <?php include_once 'includes/menu.php' ?>
        </div>

        <div class="col-md-9"> 
            <div class="header">
            
            <!--Site menu-->
            <div class="container-fluid image">
            <img src="../img/bg-scaleup.png" alt="..." />
                <div class="row">
                             <div class="col-12 title">
                            <h1>Administration<br></h1>
                            </div>
                </div>            
                           
                <div class="row">
                       
                                <div class="box col-2">
                                <a href="orders.php">    
                                <svg class="bi" width="32" height="32" fill="currentColor">
                                <use xlink:href="bootstrap-icons.svg#cash-coin"/>
                                </svg> <br>    
                                View Orders
                                </div>
                                </a>

                            
                                <div class="box col-2">
                                <a href="add_product.php">   
                                <svg class="bi" width="32" height="32" fill="currentColor">
                                <use xlink:href="bootstrap-icons.svg#file-earmark-plus"/>
                                </svg> <br>
                                Create a product 
                                </div>
                                </a>
                            
                            
                                <div class="box col-2">
                                <a href="manage_products.php">    
                                <svg class="bi" width="32" height="32" fill="currentColor">
                                <use xlink:href="bootstrap-icons.svg#pencil-square"/>
                                </svg> <br>
                                Show Products
                                </div>
                                </a>
                            
                                <div class="box col-2">
                                <svg class="bi" width="32" height="32" fill="currentColor">
                                <use xlink:href="bootstrap-icons.svg#bar-chart-line"/>
                                </svg> <br>
                                Show sales(Comming Soon)
                                </div>
                                
                                
                                <div class="box col-2">
                                <a href="logout.inc.php">    
                                <svg class="bi" width="32" height="32" fill="currentColor">
                                <use xlink:href="bootstrap-icons.svg#box-arrow-right"/>
                                </svg> <br>
                                Logout
                                </div>
                                </a>

                                <div class="box col-2 centerinside">
                                <a href="logout.inc.php">    
                                <svg class="bi" width="32" height="32" fill="currentColor">
                                <use xlink:href="bootstrap-icons.svg#box-arrow-right"/>
                                </svg> <br>
                                Logout
                                </div>
                                </a>

                </div>

                
                <div class="row">
                    <div class="box col-6">
                    <a href="orders.php">You have <b><?php echo findPendingOrders($pdo); ?></b> pending orders...</a>
                    </div>
                    <div class="box col-6">
                    <a href="orders.php">You have <b><?php echo findPendingOrders($pdo); ?></b> pending orders...</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 box">
                    Most Popular Products
                    </div>

                    <div class="col-md-6 box">
                    Sales today
                    
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 box">
                    Total this year   
                    </div>

                    <div class="col-md-6 box">
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