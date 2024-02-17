<?php
session_start();

if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
} else {
    header('Location: ../login.php?error=pleaselogin');
}


include_once '../bootstrap.php'; 

    //Getting payment options data
    $stmt = $pdo->prepare(
    'SELECT * FROM payment_options;'
    );
    $stmt->execute();
    $paymentOptions = $stmt->fetchALL();


    //Getting sales vat data
    $stmt = $pdo->prepare(
    'SELECT * FROM vat;'
    );
    $stmt->execute();
    $country = $stmt->fetchALL();

    //Getting payment options data
    $stmt = $pdo->prepare(
    'SELECT * FROM payment_options_custom;'
    );
    $stmt->execute();
    $paymentOptionsCustom = $stmt->fetchALL();

    //Getting shipping data
    $stmt = $pdo->prepare(
    'SELECT * FROM shipping;'
    );
    $stmt->execute();
    $shippings = $stmt->fetchALL();

    //Getting data for coupons
    $stmt = $pdo->prepare(
    'SELECT * FROM coupons;'
    );
    $stmt->execute();
    $coupons = $stmt->fetchALL();

    //Getting data for currency
    $stmt = $pdo->prepare(
        'SELECT * FROM currency;'
        );
        $stmt->execute();
        $currency = $stmt->fetch();


    //Getting shipping data
    $stmt = $pdo->prepare(
    'SELECT * FROM shipping;'
    );
    $stmt->execute();
    $shippings = $stmt->fetchALL();


    //Getting data for coupons
    $stmt = $pdo->prepare(
    'SELECT * FROM coupons;'
    );
    $stmt->execute();
    $coupons = $stmt->fetchALL();

    //Getting data for currency
    $stmt = $pdo->prepare(
        'SELECT * FROM currency;'
        );
        $stmt->execute();
        $currency = $stmt->fetch();

    //getting userinfo
     $userinfo = get_userinfo($user,$pdo);
    

    //Tracking check
        $stmt = $pdo->prepare(
        'SELECT * FROM tracking;'
        );
        $stmt->execute();
        $check = $stmt->fetch();
        if($check['status']) {
            $trackingCheck = $check['status'];
            $trackingCodeGa4 = $check['code'];
        } else {
            $trackingCheck=false;
        }

        //getting userinfo
        $userinfo = get_userinfo($user,$pdo);
?><a href="includes/set_tracking.inc.php?action=remove">

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Set your settings in Basic Webshop Administration">
    <title>Basic Webshop - Settings</title>
   
  <!--adding bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!--adding my own style-->
   <link rel="stylesheet" href="../css/mystyle.css">
</head>


<body>
<div class="container-fluid height full_size divbottombg">
    <div class="topbg"></div>

    <div class="row height">

        <div class="col-md-3">
            <?php include_once 'includes/menu.php' ?>
        </div>

        <div class="col-md-9 image"> 

            <div class="container-fluid image">
                <img src="../img/bg-scaleup.png" alt="..." />    
    
                      
                <div class="row">
                    <div class="col-md-12 title">
                        <h1>Administration</h1>
                        <h2>Settings</h2>
                    </div> 
                </div>

            
                <!--//Table with products-->
                <div class="row">

                    <div class="col-md-5 custom-box">
                        <div class="boxinside-one">
                        
                            My info: <br><br>
                            Shopname: <span class="fs-6 fw-light"><?php echo SHOPNAME;?></span><br>
                            Companyname: <span class="fs-6 fw-light"><?php echo COMPANYNAME;?></span><br>
                            Address: <span class="fs-6 fw-light"><?php echo ADDRESS;?></span><br>
                            City: <span class="fs-6 fw-light"><?php echo CITY;?></span><br>
                            Country: <span class="fs-6 fw-light"><?php echo COUNTRY;?></span><br>
                            Vat: <span class="fs-6 fw-light"><?php echo VAT;?></span><br>
                            Email: <span class="fs-6 fw-light"><?php echo EMAIL;?></span><br>
                            Phone: <span class="fs-6 fw-light"><?php echo PHONE;?></span><br><br>
                            <a href="change_info.php"><span class="fs-6 fw-light text-primary">Change your info</span></a><br>                    
                            <a href="change_password.php"><span class="fs-6 fw-light text-danger">Change Password (Change)</span></a><br><br> 
                        </div>    
                    
                    </div>

                    <div class="col-md-5 custom-box">
                        <div class="boxinside-one">
                            Shop Settings: <br> <br>

                            Select shop language: (Danish is comming soon)<br>  
                            <form>          
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                English
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
                            <label class="form-check-label" for="exampleRadios3">
                                Danish
                            </label><br>
                            </div>
                            <button type="button" class="btn-small btn-outline-secondary">Set language</button>
                            </form><br>

                            <b>Google Analytics Tracking:</b> <br>            
                            <?php if(!$trackingCheck) {?>    
                                <form action="includes/set_tracking.inc.php" method="POST" enctype='multipart/form-data'>
                                <div class="form-group">                    
                                <input type="text" class="form-control" name="tracking" placeholder="Example: UA-179874926-9">
                                </div>
                                <button type="submit" class="btn-small btn-outline-secondary">Set tracking </button> 
                                 <?php } else {                                  
                                echo "Tracking is set to: <b>".$trackingCodeGa4."</b>, <br><a href='includes/remove_tracking.inc.php?action=delete'>but you can <span class='text-danger'>remove by clicking here.</a></span>
                                ";} ?>
                            <br>&nbsp;<br>&nbsp;
                            </form>
                        </div>
                    </div>

                </div>

                <!--Sales Vat-->
                <div class="row">
                    
                     <div class="col-md-10 custom-box">
                        
                        <div class="boxinside-one">   
                                <strong>VAT Options:</strong> 
                                <table class="table table-striped">
                                <thead>
                                <tr>
                                <th scope="col">Country</th>
                                <th scope="col">Amount in %</th>
                                <th scope="col">Delete Option</th>
                                </tr>
                                </thead>
                                <tbody>
            
                            <?php
                            foreach ($country as $countryOption){
                            ?>
                            <tr>
                                                        
                            <td><?php echo $countryOption['country']?>    
                            </td>
                            <td><?php echo $countryOption['vat']; ?></td>
                            <td>

                            <?php  
                                echo "<a href='includes/delete_vat.inc?id=". $countryOption['id']."'>Delete</a>";
                                
                                ?>       
                            </td>
                            </tr>
                            <?php } ?>  
                            </tbody>
                            </table><p>&nbsp;</p>
                 
                     
                                <!--Add VAT option-->
                                <strong>Add VAT options:  </strong>     
                  
                                <form action="includes/add_vat_option.inc.php" method="POST" enctype='multipart/form-data'>                
                                <div class="form row">
                            
                                    <div class="col-md-4">
                                    <label for="code">Country</label>
                                    <input type="text" class="form-control" id="country" name="country" placeholder="Ect. Denmark"  required>
                                    </div>

                                    <div class="col-md-4">
                                    <label for="code">VAT in %(ONLY NUMBERS):</label>
                                    <input type="text" class="form-control" id="vat" name="vat" placeholder="Ect. 25"  required>
                                    </div>

                                </div>    

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                    <br><button type="submit" class="btn btn-primary">Add VAT option</button>
                                    </div>
                            
                                 </form>
                                </div>
                        </div>        
                    </div>
                </div>



                <!--payment options-->
                <div class="row">
                    
                     <div class="col-md-10 custom-box">
                        
                        <div class="boxinside-one">   
                                <strong>Payment Options:</strong> 
                                <table class="table table-striped">
                                <thead>
                                <tr>
                                <th scope="col">Status</th>
                                <th scope="col">Payment Option</th>
                                <th scope="col">Delete Option</th>
                                </tr>
                                </thead>
                                <tbody>
            
                            <?php
                            foreach ($paymentOptions as $payOption){
                            ?>
                            <tr>
                            <td><?php  
                                if($payOption['status']==1){
                                echo "<a href='includes/change_payment_status.inc?status=1&id=". $payOption['id']."'>activated</a>";
                                    } else {
                                echo "<a href='includes/change_payment_status.inc?status=0&id=". $payOption['id']."'>Deactivated</a>";
                                }
                                ?>    
                            </td>
                            <td><?php echo $payOption['options']; ?></td>
                            <td><i>Can´t be deleted</i></td>
                            </tr>
                            <?php } ?>  
                
                            <?php
                            foreach ($paymentOptionsCustom as $payOptionCustom){
                            echo "<tr>
                                <td>"
                            ?>
                            <?php if($payOptionCustom['status']==1){
                                    echo "<a href='includes/change_custom_payment_status.inc?status=1&id=". $payOptionCustom['id']."'>activated</a>
                                    </td>
                                    <td>". $payOptionCustom['options']." <i>- (Custom payment Option)</i></td> 
                                    <td><a href='includes/delete_custom_payment.inc.php?id=". $payOptionCustom['id']. "'> Delete this option</a></td>
                                    </tr>    
                                    ";
                                        } else {
                                    echo "<a href='includes/change_custom_payment_status.inc?status=0&id=". $payOptionCustom['id']."'>Deactivated</a>
                                </td>
                                <td>". $payOptionCustom['options']." <i>- (Custom payment Option)</i></td> 
                                <td><a href='includes/delete_custom_payment.inc.php?id=". $payOptionCustom['id']. "'> Delete this option</a></td>
                                </tr>";
                                }
                            }?>
                            </tbody>
                            </table><p>&nbsp;</p>
                 
                     
                                <!--Make a custom payment method-->
                                <strong>Add custom payment options:  </strong>     
                  
                                <form action="includes/add_payment_custom.inc.php" method="POST" enctype='multipart/form-data'>                
                                <div class="form row">
                            
                                    <div class="col-md-4">
                                    <label for="code">Customer text:</label>
                                    <input type="text" class="form-control" id="code" name="description" placeholder="Ect. pay in 25 rates"  required>
                                    </div>

                                    <div class="col-md-4">
                                    <label for="code">Your info(customer hidden):</label>
                                    <input type="text" class="form-control" id="code" name="info" placeholder="Ect. Create 25 invoices"  required>
                                    </div>

                                </div>    

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                    <br><button type="submit" class="btn btn-primary">Add payment option</button>
                                    </div>
                            
                                 </form>
                                </div>
                        </div>        
                    </div>
                </div>

                <!--Shipping methods-->

                <div class="row">
                        <div class="col-md-10 custom-box">
                            <div class="boxinside-one">
                        
                                    Shipping Methods:            
                                    <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">Status</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Shipping Time</th>
                                        <th scope="col">price</th>
                                        <th scope="col">Delete option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                    
                                    <?php
                                    foreach ($shippings as $shipping){
                                    ?>
                                    <tr>
                                    <td><?php  
                                        if($shipping['status']==1){
                                        echo "<a href='includes/change_shippingStatus.inc.php?status=1&id=". $shipping['id']."'>activated</a>";
                                            } else {
                                        echo "<a href='includes/change_shippingStatus.inc.php?status=0&id=". $shipping['id']."'>Deactivated</a>";
                                        }
                                        ?>    
                                    </td>
                                    <td><?php echo $shipping['description']; ?></td>
                                    <td> <?php echo $shipping['shippingTime']; ?></td>
                                    <td><?php echo $shipping['price']; ?>  </td>
                                    <td><?php echo "<a href='includes/delete_shipping.inc.php?id=". $shipping['id']."'>Delete</a>";?></td>
                                    </tr>
                                    <?php } ?>   
                                    </tbody>
                                    </table>
                                    
                              

                                <!--Inserting a new shipping option-->
                                <form action="includes/add_shipping.inc.php" method="POST" enctype='multipart/form-data'>                
                                        <div class="form row">
                                            <div class="col-md-2">
                                            <label for="name">Shipping method:</label>
                                            <input type="text" class="form-control" id="name" name="shippingMethod" placeholder="ect. Airdrop-delivery"  required>
                                            </div>

                                        
                                            <div class="col-md-2">
                                            <label for="code">Shipping time:</label>
                                            <input type="text" class="form-control" id="code" name="time" placeholder="ect. 3 days"  required>
                                            </div>

                                            <div class="col-md-2">
                                            <label for="validationCustom05">Price</label>
                                            <input type="text" class="form-control" id="discount" name="price" placeholder="Only numbers" required>
                                            </div>

                                            <div class="col-md-2">
                                            <label for="validationCustom05">Price</label>
                                            <input type="text" class="form-control" id="discount" name="price" placeholder="Only numbers" required>
                                            </div>
                                        </div>    

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                            <br><button type="submit" class="btn btn-primary">Add shipping option</button>
                                            </div>
                                        </div>
                                </form>         
                               
                        </div>
                    </div>                   
                </div>


                <div class="row">
                        <div class="col-md-10 custom-box">
                            <div class="boxinside-one">
                        
                                Coupons: <br>            
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">Status</th>
                                        <th scope="col">Coupon name</th>
                                        <th scope="col">Coupon code</th>
                                        <th scope="col">Discount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                    
                                    <?php
                                    foreach ($coupons as $coupon){
                                    ?>
                                    <tr>
                                    <td><?php  
                                        if($coupon['status']==1){
                                        echo "<a href='includes/change_coupons.inc.php?status=1&id=". $coupon['id']."'>activated</a>";
                                            } else {
                                        echo "<a href='includes/change_coupons.inc.php?status=0&id=". $coupon['id']."'>Deactivated</a>";
                                        }
                                        ?>    
                                    </td>
                                    <td><?php echo $coupon['name']; ?></td>
                                    <td> <?php echo $coupon['code']; ?></td>
                                    <td> <?php echo $coupon['discount']; ?></td>
                                    <td><?php echo "<a href='includes/delete_coupon.inc.php?id=". $coupon['id']."'>Delete</a>";?></td>
                                    </tr>
                                    <?php } ?>   
                                    </tbody>
                                </table>
                                    
                                    <!--Inserting a new coupon-->
                                <form action="includes/add_coupon.inc.php" method="POST" enctype='multipart/form-data'>                
                                    <div class="form row">
                                        <div class="col-md-4">
                                        <label for="name">Coupon name:</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name of coupon"  required>
                                        </div>

                                    
                                        <div class="col-md-3">
                                        <label for="code">Coupon code:</label>
                                        <input type="text" class="form-control" id="code" name="code" placeholder="Code to type"  required>
                                        </div>

                                        <div class="col-md-3">
                                        <label for="validationCustom05">Discount in %</label>
                                        <input type="text" class="form-control" id="discount" name="discount" placeholder="Only numbers" required>
                                        </div>
                                    </div>    

                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                    <br><button type="submit" class="btn btn-primary">Add coupon option</button>
                                        </div>
                                    </div>
                            
                                </form>
                            </div>    
                    </div>
                </div>

                <div class="row">
                        <div class="col-md-10 custom-box">
                            <div class="boxinside-one">
         
                                <form action="includes/change_currency.inc.php?id=<?php echo $currency['id']; ?>" method="POST" enctype='multipart/form-data'>                
                                    <div class="form row">
                                        <div class="col-sm-5">
                                        <label for="currency">Currency:</label>
                                        <input type="text" class="form-control" id="currency" name="currency" value="<?php echo $currency['currency'] ?>" required>
                                        </div>
                                    
                                        <div class="col-sm-5">
                                        <label for="symbol">Symbol:</label>
                                        <input type="text" class="form-control" id="symbol" name="symbol" value="<?php echo $currency['symbol'] ?>" required>
                                        </div>

                                        <div class="col-sm-10">
                                        <br> <button type="submit" class="btn btn-primary">Change currency</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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


