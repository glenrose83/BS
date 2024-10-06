<?php
session_start();
include_once '../bootstrap.php'; 

//Check if user is logged in
User::isLoggedIn();

//intialising objects
$database = new Database;


//GET id from url  and Fetch order from DB
$sanitized_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


 //getting data for orderinfo and this is the ordernumber.
 $data=[
    'id' => $sanitized_id 
];

//Getting data on the customer
$stmt = $database->connection->prepare("SELECT * FROM `orders` LEFT JOIN `customers` ON orders.fk_customer = customers.id WHERE orders.id=$sanitized_id");
$stmt->execute();
$customer = $stmt->fetch();

//NEW getting all data by inner joins 3 tables
$stmt = $database->connection->prepare("
SELECT * FROM `orders` od 
INNER JOIN `ordered_products` op 
ON od.id = op.fk_orders 
INNER JOIN `products` pr 
ON pr.id = op.fk_products 
WHERE od.id = $sanitized_id");
$stmt->execute();
$order = $stmt->fetchALL();
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
        <div class="col-md-2">
            <?php include_once 'includes/menu.php' ?>
        </div>

        <!--content window-->
        <div class="col-md-10 full-height"> 
        
                <div class="header">
                        
                        <!--Site menu-->
                        <div class="container-fluid image">
                        <img src="../img/bg-scaleup.png" alt="..." />
                            <div class="row">
                                        <div class="col-11 title">
                                        <h1>Handle order<br></h1>

                                        <!--Alert--> 
                                        <center><span class="half-width"><?php echo Misc::alert(); ?></span></center>
     
                                        </div>
                            </div>            
                        </div>
                            
                </div>            
             
                <!--content 1-->                      
                <div class="row">

                        <div class="col-md-5 boxinside-one">    
                            <?php 
                            echo "<b>Customer:</b><p>"
                            .$customer['fullname']."<br>"
                            .$customer['streetname']." ".$customer['housenr']."<br>"
                            .$customer['postcode']." ".$customer['city']."<br>"
                            .$customer['phone']."<br>"
                            .$customer['email']."</p>"
                            ."<p><b>Payment Method: </b>".$customer['payment_method']
                            ."<br><b>Delivery Method: </b>".$customer['delivery_method']."</p>";
                            ?>
                        </div>

                        <div class="col-md-1">    
                        </div>

                        <div class="col-md-5 boxinside-one">    
                                <b>Status: </b>
                                <?php echo handle_color($customer['status']);?><br><br>
                                <b>Actions:</b><br>
                                <form action="includes/handle_orderstatus.inc.php?id=<?php echo $sanitized_id;?>" method="POST" enctype="multipart/form-data">
                                <select class="form-control" id="categorySelector" name="status" required>
                                    
                                    <?php
                                    $sql = 'SELECT * FROM `order_statuses`';
                                    $stmt= $database->connection->prepare($sql);
                                    $stmt->execute();
                                    $statuses = $stmt->fetchALL(); 
                                    
                                    foreach($statuses as $status){ ?>
                                    <option>
                                        <?php echo $status['status'] . "</option>"; 
                                    }?> 
                                    </select><br>
                                    <button type="submit" class="btn btn-primary">Set status</button>
                                
                                        
                                </form>
                        </div>
                    
                        <div class="col-md-11 boxinside-one">    
                                <b>Items:</b><br>
                                <table class='table table-striped'>
                                <tr>
                                    <th scope='col'>Productno.</th>
                                    <th scope='col'>Name</th>
                                    <th scope='col'>Qty</th>
                                    <th scope='col'>Stock</th>
                                    <th scope='col'>Price Each</th>
                                    <th scope='col'>Price Total</th>
                                </tr>
                                <?php foreach ($order as $ordered) { echo "
                                    <tr>
                                        <td scope='col'>".$ordered['id']."</th>
                                        <td scope='col'>".$ordered['productname']."</th>
                                        <td scope='col'>".$ordered['qty']."</th>
                                        <td scope='col'>".$ordered['howmanyinstock']."</th>
                                        <td scope='col'>".$ordered['pricesxvat']."</th>
                                        <td scope='col'>".$ordered['howmanyinstock']."</th>
                                    </tr>
                                "; } ?>
                                    
                                </table>
                        </div>

                        <div class="col-md-5 boxinside-one">    
                                
                                <?php 
                                echo "Time: ".$customer['order_date']."; <br>
                                IP: ".$customer['ip']." <br>"
                                ."Customerid: ".$customer['id']."
                                User Client: ".$customer['browser']."<br>"
                        
                                ?>
                        </div>

                        <div class="col-md-1">                                   
                        </div>

                        <div class="col-md-5 boxinside-one">    
                                <?php 
                                echo "
                                Shipping: <br>
                                Coupons: <br>
                                Items subtotal: ".$customer['total_price']."<br>
                                Stripe/Bambora Fee:<br>
                                Total Paid by costumer:
                                "
                                ?>  
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















