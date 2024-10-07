<?php
session_start();

if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
} else {
    header('Location: ../login.php?error=pleaselogin');
}

include_once '../bootstrap.php'; 

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
                        <h2>Manage Products</h2>
                    </div> 
                </div>

        <!--//Table with products-->

            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Orders</th>

                </tr>
            </thead>
            <tbody>
            <?php
                    //Fetch all products from DB
                    $stmt = $database->connection->prepare("SELECT * FROM customers");
                    $stmt->execute(); 
                    $customer = $stmt->fetchALL();

                    //echo out products
                    
                    foreach($customer as $customers) {
                        echo" <tr>
                        <td>".$customers['fullname']."</td>
                        <td>".$customers['streetname']. " " .$customers['housenr']. ", " . $customers['etc'] . ", " . $customers['country'] ."</td>
                        <td>".$customers['email']."</td>
                        <td>".$customers['phone']."</td>
                        <td> Click to see orders </td>
                    </tr>";
                    } 
                    ?>

            </tbody>
            </table>



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