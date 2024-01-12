<?php
    //This is run when add to cart is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productid = $_POST['hidden_id'];
    $productprice = $_POST['hidden_price'];
    $productname = $_POST['hidden_productname'];
    
    //adding chosen product to an array and then to cart
    if(isset($_SESSION['cart'])){

        //If cart isset and it checks if product is already in cart   
        //if product is not in cart it runs code below 
        $item_array_id = array_column($_SESSION["cart"], "itemID");
        if(!in_array($productid, $item_array_id)){
        
            $count = count($_SESSION['cart']);

            $item_array = array(
                'itemID' => $productid,
                'item_name' => $productname,
                'item_price' => $productprice,
                'quantity' => 1
            );
    
            $_SESSION['cart'][$count] = $item_array;
        
        } else {
        
            //Adding one more to cart
            $key = searchForId($productid, ($_SESSION['cart']));
            $quant = $_SESSION['cart'][$key]['quantity'];
            ++$quant;
            $_SESSION['cart'][$key]['quantity'] = $quant;

        }

    } else {
            //if cart !isset and add this first product
             $item_array = array(
                'itemID' => $productid,
                'item_name' => $productname,
                'quantity' => 1,
                'item_price' => $productprice
            );
    
            $_SESSION['cart'][0] = $item_array;
    } 

    
}  else {
   // This is an empty cart
} 
?>
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

<div class="container-fluid">
    <div class="col-md-12">
        SLIDER Yeah
    </div>
</div>

<div class="container">
        <div class="col-md-1">
        </div>
        
        <div class="col-md-10">
        
            <!--Content goes heade-->
            <h2>Choose a category</h2>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                <img src="img/focusbox1.jpg"> 
                                <img src="img/focusbox1.jpg">
                                <img src="img/focusbox1.jpg">
                                </center>
                            </div>      
                        </div>
                    </div>


                    <h3 ><p><br></p>All Products</h2>
                            
                    <?php
                   //Fetch all products from DB
                    $stmt = $pdo->prepare("
                    SELECT * FROM products pr
                    INNER JOIN product_images prim
                    ON pr.id =prim.fk_id
                    WHERE prim.primary_pic = 1
                    ");
                    $stmt->execute(); 
                    $product = $stmt->fetchALL();
                    ?>

                    <!-- echo out products -->
                    <div class="col-md-12">
                        <div class="row">
                    
                    

                            <?php

                            foreach($product as $products) {
                                $hidden_productid = $products['id'];
                                $hidden_price = $products['pricesxvat'];
                                $hidden_productname =  $products['productname'];

                                ?>
                                
                                <div class="col-md-2">
                                <img class="cus-thumb" src="<?php echo $products['url']; ?>"><br>
                                <b><?php echo $products['productname'];?></b><br>
                                <?php echo $products['pricesxvat'];?> kr.
                                <p></p>
                                <form action="index.php?action=addtocart" method="POST">
                                <input type="hidden" name="hidden_id" value="<?php echo $hidden_productid; ?>" > 
                                <input type="hidden" name="hidden_price" value="<?php echo $hidden_price; ?>" > 
                                <input type="hidden" name="hidden_productname" value="<?php echo $hidden_productname; ?>" > 
                                <button type="submit" class="btn btn-success">Add to cart</button><br><p></p></br>
                                
                                </form>
                                </div>
                                                                            
                                <?php
                
                            }    
                                ?>
                        </div>        
                    </div>    






        </div>

        <div class="col-md-1">
        </div>
</div>        
