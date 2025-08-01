<?php
session_start();
include_once '../bootstrap.php'; 

//Check if user is logged in
User::isLoggedIn();

//Getting the right DB
include '../shops/'. $_SESSION['shopname'] .'/shop_db_class.php';

$database = new DatabaseShop;

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

        <!--content window-->
        <div class="col-md-9 full-height"> 
    
                <div class="header">
                        
                        <!--Site menu-->
                        <div class="container-fluid image">
                        <img src="../img/bg-scaleup.png" alt="..." />
                            <div class="row">
                                        <div class="col-10 title">
                                        <h1>Orders<br></h1>
                                        </div>
                            </div>            
                        </div>
                            
                </div>            
             
                <!--content 1-->                      
                <div class="row">
                    <div class="col-md-10 custom-box">
                        <div class="boxinside-one"> 
                                        <!--//Table with products-->
                                        

                                                            <table class="table table-striped">
                                                            <thead>
                                                            <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Ordrenumber</th>
                                                            <th scope="col">Date</th>                
                                                            <th scope="col">Customer Name</th>
                                                            <th scope="col">Total price</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                //Fetch all products from DB
                                                                $stmt = $database->connection->prepare("SELECT customers.fullname, orders.* FROM `customers`  
                                                                LEFT JOIN `orders` ON customers.id = orders.fk_customer ORDER BY id DESC");
                                                                $stmt->execute(); 
                                                                $orders = $stmt->fetchALL();

                                                                //echo out products
                                                                
                                                                foreach($orders as $order) {
                                                                    echo" <tr>
                                                                    <td><a href='handle_order.php?id=".$order['id']."'><button type='button' class='btn btn-info'>Handle order</button></a></td>
                                                                    <td>".$order['status']."</td>                        
                                                                    <td>".$order['id']."</td>
                                                                    <td>".$order['order_date']."</td>
                                                                    <td>".$order['fullname']."</td>
                                                                    <td>".$order['total_price']."</td>
                                                                </tr>";
                                                                } 
                                                                ?>

                                                                </tbody>
                                                                </table>
                                                       
                        
                        </div> 
                    </div>                                                                    
                </div>
                <!--end of content 1-->
                        
                          
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