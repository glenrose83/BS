<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Basic Shop - Free Webshops To The People</title>

<!--adding my own style-->
<link rel="stylesheet" href="../../css/mystyle.css">
    <!--adding bootstrap-->
<link rel="stylesheet" href="../../css/bootstrap.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
include_once '../../bootstrap.php'; 
?>
</head>

<body>
    <header>
    <?php 
    include_once '../../templates/basic/header.php'; 
    ?>
    </header>

    <main>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
                   
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Sport</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Casual</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
    

    </div>
</nav>
<div class="container ">
        <div class="col-md-1 ">
        </div>
        
        <div class="col-md-10 ">
            <p><br></p>
            <table class="table table-sm">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Item ID</th>
                <th scope="col">Qty</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

            <?php
                if(isset($_SESSION['cart'])){

                    $count = count($_SESSION['cart']);                  

                    for ($x = 0; $x < $count; $x++) {
                    echo "
                    <tr>
                    <th scope='row'>" . $_SESSION['cart'][$x]['item_name'] . "</td>
                    <td>" . $_SESSION['cart'][$x]['itemID'] . "</td>
                    <td>" . $_SESSION['cart'][$x]['quantity'] . "</td>
                    <td>" . $_SESSION['cart'][$x]['item_price'] . "</td>
                    <td> <a href='../../functions/manage_cart.inc.php?delete_product=".$x."><button type='button' class='btn btn-outline-danger btn-sm'>X</button></a></td></tr>";
                      }
                    echo "<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td></tr>";

                    $subtotal = ukSubtotal();  
                    $ordertotal = Ordertotal($subtotal);
                    echo "<tr><td>Subtotal</td><td></td><td></td><td>". $subtotal ."</td><td></td></tr>
                    <tr><td>VAT</td><td></td><td></td><td>".Vat($subtotal)."</td><td></td><tr>
                    <tr><th>Order Total</td><td></td><td></td><th>". $ordertotal . "</td><td></td></tr>";

                 
                } else {
                    echo "<p><br></p><center><h3>Your cart is empty</h3></center><p><br></p>";
                }
                
                //saving ordertotal to later
                $_SESSION['ordertotal'] = $ordertotal;
                ?>

               
            </tbody>
            </table>
            <a href="checkout_design.php"><button type="button" class="btn btn-success">Checkout</button></a>

        </div>

        <div class="col-md-1 ">
        </div>
</div>   



    <footer>
    <?php 
       


    include_once '../../templates/basic/footer.php' ?>
    </footer>

<!--Javascript used by bootstrap-->
<script src="../../js/bootstrap.bundle.min.js"></script>       
</body>
</body>
</html>
