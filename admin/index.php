<?php
session_start();
include_once '../bootstrap.php'; 
$database = new Database;
$orders = new Orders;

//Check if user is logged in
User::isLoggedIn();

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
<div class="container-fluid full_size">
    <div class="topbg"></div>

    <div class="row">

    <!--menu-->
    <div class="col-md-3">
        <?php include_once 'includes/menu.php' ?>
    </div>

    <div class="col-md-9 full-height"> 
    
        <div class="header">
                
                <!--Site menu-->
                <div class="container-fluid image">
                <img src="../img/bg-scaleup.png" alt="..." />
                    <div class="row">
                                <div class="col-10 title">
                                <h1>Administration<br></h1>
                                </div>
                    </div>            
                            

                <!--main div content-->
                    <div class="row">
                        <div class="col-2">
                                <div class="boxinside">
                                    <a href="orders.php">    
                                   <center><svg class="bi" width="32" height="32" fill="currentColor">
                                    <use xlink:href="bootstrap-icons.svg#cash-coin"/>
                                    </svg> <br>
                                    View Orders
                                    </a>
                                    </center>
                                    </div>
                                </div>
                                

                            
                        <div class="col-2">
                                <div class="boxinside">
                                    <a href="add_product.php">  
                                    <center>     
                                    <svg class="bi" width="32" height="32" fill="currentColor">
                                    <use xlink:href="bootstrap-icons.svg#file-earmark-plus"/>
                                    </svg> <br>
                                    Create a product 
                                    </center>
                                </div>
                        </div>  
                                </a>
                            
                            
                               
                            
                               
                                <div class="col-2">
                                    <div class="boxinside">
                                    <a href="logout.inc.php">    
                                    <center>    
                                    <svg class="bi" width="32" height="32" fill="currentColor">
                                    <use xlink:href="bootstrap-icons.svg#box-arrow-right"/>
                                    </svg> <br>
                                    Create/Show Categories
                                    </center>
                                    </div>
                                </a>
                                </div>

                                <div class="col-2">
                                    <div class="boxinside">   
                                    <center>
                                    <svg class="bi" width="32" height="32" fill="currentColor">
                                    <use xlink:href="bootstrap-icons.svg#bar-chart-line"/>
                                    </svg> <br>
                                    Show Sales Statistics
                                    </center>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="boxinside">
                                    <a href="../logout.php">    
                                    <center>
                                    <svg class="bi" width="32" height="32" fill="currentColor">
                                    <use xlink:href="bootstrap-icons.svg#box-arrow-right"/>
                                    </svg> <br>
                                    Logout
                                    </center>
                                    </div>
                                </div>
                                </a>

                </div>

                
                <div class="row">
                    <div class="col-5">
                        <div class="box">
                        <a href="orders.php">You have <b><?php echo Orders::FindPendingOrders($database); ?></b> pending orders...</a>
                        </div>  
                    </div>
                    <div class="col-5">
                        <div class="box">
                        <a href="orders.php">Visits in your shop today</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="box">
                        <a href="orders.php">Sales this week</a>
                        </div>  
                    </div>
                    <div class="col-5">
                        <div class="box">
                        <a href="orders.php">Sales this month</a>
                        </div>
                    </div>
                </div>                        
        
                    </div>
                </div>
        </div>
    </div>

    <div class="divbottombg"></div>

</div>




<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
</body>
</html>