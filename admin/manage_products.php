<?php
session_start();
include_once '../bootstrap.php'; 

//Check if user is logged in
User::isLoggedIn();

//Getting the right DB
include '../shops/'. $_SESSION['shopname'] .'/shop_db_class.php';

$database = new DatabaseShop;
$products = new Products;

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

        <!--content window-->
        <div class="col-md-9 full-height"> 
    
                <div class="header">
                        
                        <!--Site menu-->
                        <div class="container-fluid image">
                        <img src="../img/bg-scaleup.png" alt="..." />
                            <div class="row">
                                        <div class="col-10 title">
                                        <h1>Add a product<br></h1>

                                        
                                        <!--Alert--> 
                                        <center><span class="half-width"><?php echo Misc::alert(); ?></span></center>

                                        </div>
                            </div>            
                        </div>
                            
                </div>            
             
                <!--content 1-->                      
                <div class="row">
                    <div class="col-md-10 custom-box">
                                        
                                                    
                                            <div class="boxinside">                        
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
                                                        $stmt = $database->connection->prepare("SELECT * FROM `products`");
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
