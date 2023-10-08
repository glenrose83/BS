<?php
session_start();
include_once '../bootstrap.php'; 



//GET id from url  and Fetch order from DB
$sanitized_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


 //getting data for orderinfo and this is the ordernumber.
 $data=[
    'id' => $sanitized_id 
];
$stmt = $pdo->prepare("SELECT * FROM orders LEFT JOIN customers ON orders.fk_customer = customers.id WHERE orders.id=$sanitized_id");
$stmt->execute();
$buyer = $stmt->fetch();

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
    <div class="row">

        <div class="col-md-3 admin-menu">
            <?php include_once 'includes/menu.php' ?>
        </div>

        <div class="col-md-9"> 

            <div class="container-fluid">
                
                
                <div class="row">
                    <div class="col-md-12">
                        <h1>Administration</h1>
                        <h2>Handle Order</h2>
                    </div> 
                </div>
           
        
           
                <div class="row">
                   
                        <div class="col-md-6 custom-box">    
                        <?php 
                        echo "<b>Customer:</b><p>"
                        .$buyer['fullname']."<br>"
                        .$buyer['streetname']." ".$buyer['housenr']."<br>"
                        .$buyer['postcode']." ".$buyer['city']."<br>"
                        .$buyer['phone']."<br>"
                        .$buyer['email']."</p>"
                        ."<p><b>Payment Method: </b>".$buyer['payment_method']
                        ."<br><b>Delivery Method: </b>".$buyer['delivery_method']."</p>";
                        ?>
                        </div>

                        <div class="col-md-3 custom-box">    
                        <?php 
                        echo "<b>Status: </b>".$buyer['status']."
                        <br><br><b>Actions:</b><br>"
                        ."Order Sent Out<br>"
                        ."Cancel Order<br>"
                        ."Send customer email";
                        ?>
                        </div>
                    
                        <div class="col-md-9 custom-box">    
                        <?php 
                        echo "<b>Items:</b><br>
                        <table class='table table-striped'>
                        <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>First</th>
                            <th scope='col'>Last</th>
                            <th scope='col'>Handle</th>
                        </tr>
                        <tr>
                            <td scope='col'>234234</th>
                            <td scope='col'>234234234</th>
                            <td scope='col'>234234</th>
                            <td scope='col'>2423423</th>
                        </tr>
                        </table>"                       
                        ?>
                        </div>

                        <div class="col-md-5 custom-box">    
                        <?php 
                        echo "Time: ".$buyer['order_date']."<br>
                        IP:<br>
                        User Client: <br>"
                        ."Customerid: ".$buyer['id']
                        ?>
                        </div>

                        <div class="col-md-4 custom-box">    
                        <?php 
                        echo "
                        Shipping: <br>
                        Coupons: <br>
                        Items subtotal: ".$buyer['total_price']."<br>
                        Stripe/Bambora Fee:<br>
                        Total Paid by costumer:
                        "
                        ?>
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



