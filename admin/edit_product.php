<?php
session_start();
include_once '../bootstrap.php'; 

//GET id from url  and Fetch product from DB
$sanitized_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$stmt = $pdo->prepare("SELECT * FROM products WHERE id=$sanitized_id");
$stmt->execute(); 
$product = $stmt->fetch();

//Checking if user has access
if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];

    //Updating DB if GET product is set
    if(isset($_GET['category'])){
        $clean_category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);        
        change_category($clean_category, $sanitized_id, $pdo);
        header('Location: edit_product.php?id='.$sanitized_id);
        }

} else {
    header('Location: ../login.php?error=pleaselogin');
}

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
                        <h2>Edit Product</h2>
                    </div> 
                </div>

              
                <div class="row">
                    <div class="col-md-6 custom-box">
                        <form class="pure-form pure-form-aligned" action="includes/edit_product.inc.php?id=<?php echo $sanitized_id ?>" method="POST" enctype='multipart/form-data'>
                            <fieldset>
                        
                                <div class="pure-control-group">
                                    Product status<br>
                                    <input type="radio" id="aligned-name" name="productstatus" value="1" checked> Enable
                                    <input type="radio" id="aligned-name" name="productstatus" value="0" > Disable
                                    <span class="pure-form-message-inline"></span>
                                </div>
    
                                <p><br></p>
                                <div class="form-group row">
                                    <label for="productname" class="col-sm-4 col-form-label">Productname</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="aligned-name" name="productname" value="<?php echo $product['productname'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="productdescription" class="col-sm-4 col-form-label">Product description</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="aligned-name" name="productdescription" value="<?php echo $product['productdescription'];?>" />
                                        </div>
                                </div>
                        
                              
    
                                <div class="form-group row"> 
                                    <label for="priceexvat" class="col-sm-4 col-form-label">Price ex. VAT</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="aligned-name" name="priceexvat" value="<?php echo $product['pricesxvat'];?>">
                                    </div>
    
                                </div>
                                <div class="form-group row">
                                    <label for="deliv                                                                                                                                                                                                                                                                                                                                                                                                                       erytime"  class="col-sm-4 col-form-label">Deliverytime</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="aligned-name" name="deliverytime" value="<?php echo $product['deliverytime'];?>" />
                                        </div>
                                </div>
                            </fieldset> 
                        
                    </div>

                   
                    <div class="col-md-5 custom-box">
                    <?php if($product['image']){
                       echo "<img src='includes/img/img_0170.jpg.jpeg' class='edit-prod-pic'>";

                    } else {
                        echo "<center><p><br></p>You have not uploaded at picture<br><br><a href='picture_uploader.php?id=". $sanitized_id ."'>Clik here to upload a picture</a></center>";                
                    }
                    ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-11 custom-box">
                                
                                <div class="pure-control-group">
                                    Keep track of stock<br>
                                    <input type="radio" id="aligned-name" name="keeptrackofstock" value="1" checked/> Yes
                                    <input type="radio" id="aligned-name" name="keeptrackofstock" value="0" /> No
                                    <span class="pure-form-message-inline"></span>
                                </div>
                                <br>
                                <div class="pure-control-group">
                                    Allow purchase when stock is empty<br>
                                    <input type="radio" id="aligned-name" name="allowpurchasewhenempty" value="1" checked/> Yes
                                    <input type="radio" id="aligned-name" name="allowpurchasewhenempty" value="0" /> No
                                    <span class="pure-form-message-inline"></span>
                                </div>
        
                                
        
                                <p><br></p>
        
                                <div class="form-group row">
                                        <label for="itemnumber"  class="col-sm-4 col-form-label">Item number</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="aligned-name" name="itemnumber" value="<?php echo $product['item'];?>" />
                                            </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for='category'  class='col-sm-4 col-form-label'>Category</label>
                                    <div class="col-sm-6">
                                
                                <select class="form-control" id="categorySelector" name="category">
                                <option selected>
                                    <?php echo $product['category'];?>

                                </option>
                                 <!-- Getting data from database and using it for dropdown menu -->
                                                    <?php
                                                    $sql = "SELECT * FROM categories";
                                                    $stmt= $pdo->prepare($sql);
                                                    $stmt->execute();
                                                    $items = $stmt->fetchALL(); 
                                                        foreach($items as $item){?>
                                                        <option><?php echo $item['cat'] . "</option>"; 
                                                    }?>
                                                    </select>
                                                  
                                    </div>
                                        
                                              
                                </div>
        
                                <div class="form-group row">
                                        <label for="howmanyareinstock"  class="col-sm-4 col-form-label">How many are in stock</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="aligned-name" name="howmanyareinstock" value="<?php echo $product['howmanyinstock'];?>" />
                                            </div>
                                </div>
        
                                <div class="form-group row">
                                        <label for="weight"  class="col-sm-4 col-form-label">Weight in gram</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="aligned-name" name="weight" value="<?php echo $product['weight'];?>" />
                                            </div>
                                </div>
                                <div class="form-group row">
                                        <label for="costprice"  class="col-sm-4 col-form-label">Costprice</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="aligned-name" name="costprice" value="<?php echo $product['costprice'];?>" />
                                            </div>
                                </div>
        
                                <div class="form-group row">
                                        <label for="expenses"  class="col-sm-4 col-form-label">Expenses for each product</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="aligned-name" name="expenses" value="<?php echo $product['expenses'];?>" />
                                            </div>
                                </div>

                                <div class="pure-control-group">Your notes<br>
                                    <textarea class="aligned-name col-sm-10" name="yournotes" value="<?php echo $product['yournotes'];?>"></textarea>                          
                                </div>
                                
                                <p><br></p>                                   
                                <button type="submit" name="submit" value="upload" class="btn btn-success">Change product</button>                                                
                              </form>
                    </div>
                    
                </div>
            <p><br></p>
                        
            

        </div>


        
    </div>
</div>

<!--Javascript and stuff-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>