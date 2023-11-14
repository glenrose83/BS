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

            <div class="container-fluid">
                    
                <div class="row">
                    <div class="col-md-12">
                        <h1>Administration</h1>
                        <h2>Orders</h2>
                    </div> 
                </div>

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
                    $stmt = $pdo->prepare("SELECT customers.fullname, orders.* FROM customers  
                    LEFT JOIN orders ON customers.id = orders.fk_customer ORDER BY id DESC");
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

<!--Javascript and stuff-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>