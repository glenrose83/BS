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
                        <h2>Manage Products</h2>
                    </div> 
                </div>

                <!--//Table with products-->
                <div class="row">
                <div class="col-md-12 custom-box">
                        
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Itemnumber</th>
                        <th scope="col">Name</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Edit Product</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            //Fetch all products from DB
                            $stmt = $pdo->prepare("SELECT * FROM products");
                            $stmt->execute(); 
                            $product = $stmt->fetchALL();

                            //echo out products  - showProductimage($products['id'],$pdo).s
                            
                            foreach($product as $products) {
                                echo" <tr>
                                <td>".$products['item']."</td>
                                <td>".$products['productname']."</td>
                                <td>".$products['howmanyinstock']."</td>
                                <td>".$products['category']."</td>
                                <td>".$products['pricesxvat']."</td>
                                <td><a href='includes/manage_products.inc.php?delete_product=".$products['id']."><button type='button' class='btn btn-outline-danger btn-sm'>X</button></a></td>
                                <td><a href='edit_product.php?id=". $products['id'] . "'><button type='button' class='btn btn-outline-danger btn-sm'>O</button></a></td>
                            </tr>";
                            } 
                            ?>

                    </tbody>
                    </table>
                </div>
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