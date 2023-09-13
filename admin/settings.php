<?php
session_start();

if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
} else {
    header('Location: ../login.php?error=pleaselogin');
}

include_once '../bootstrap.php'; 

//instantiating object from class
$settings = new settings;

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

?>

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
                        <h2>Settings</h2>
                    </div> 
                </div>

            
                <!--//Table with products-->
                <div class="row">
                    <div class="col-md-5 custom-box">
                    My info: <br><br>
                    Shopname: <span class="fs-6 fw-light"><?php echo $settings->shopname;?></span><br>
                    Companyname: <span class="fs-6 fw-light"><?php echo $settings->companyname;?></span><br>
                    Address: <span class="fs-6 fw-light"><?php echo $settings->address;?></span><br>
                    City: <span class="fs-6 fw-light"><?php echo $settings->city;?></span><br>
                    Country: <span class="fs-6 fw-light"><?php echo $settings->country;?></span><br>
                    Vat: <span class="fs-6 fw-light"><?php echo $settings->vat;?></span><br>
                    Email: <span class="fs-6 fw-light"><?php echo $settings->email;?></span><br>
                    Phone: <span class="fs-6 fw-light"><?php echo $settings->phone;?></span><br>
                    <a href="change_settings.php"><span class="fs-6 fw-light text-primary">Change your info</span></a><br>                    
                    <a href="change_password.php"><span class="fs-6 fw-light text-danger">Change Password (Change)</span></a><br><br> 
                    
                   
                    </div>

                    <div class="col-md-5 custom-box">
                    Shop Settings: <br> <br>
                    

                        Select shop language: <br>  
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

                       Tracking: <br>            
                       <form>
                        <div class="form-group">                    
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                        <button type="button" class="btn-small btn-outline-secondary">Set tracking</button>
                        </form>
                        <br>

                        Set Sales VAT: <br>   
                        <form>
                        <div class="form-group">                    
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                        </div>
                        <button type="button" class="btn-small btn-outline-secondary">Set sales VAT</button>

                        </form>

                    </div>

                </div>


                <div class="row">
                    
                     <div class="col-md-10 custom-box">
                    Payment Methods: <br>            
                    test <br>
                    </div>

                </div>

                <div class="row">
                     <div class="col-md-10 custom-box">
                    Shipping Methods:            
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Status</th>
                        <th scope="col">Description</th>
                        <th scope="col">Shipping Time</th>
                        <th scope="col">price</th>
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
                        <br><button type="submit" class="btn btn-primary">Add shipping option</button>
                            </div>
                </div>

                <div class="row">
                    <div class="col-md-10 custom-box">
                        
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
                    
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10 custom-box">
         
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

<!--Javascript and stuff-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>


