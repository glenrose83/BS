<?php
session_start();
include_once '../bootstrap.php'; 

//Getting the right DB
include '../shops/'. $_SESSION['shopname'] .'/shop_db_class.php';

//Check if user is logged in
User::isLoggedIn();

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

                                        </div>
                            </div>            
                        </div>
                            
                </div>            
             
                <!--content 1-->                      
                <div class="row">
                    <div class="col-md-10 custom-box">
                        <div class="boxinside-one"> 

                            <form class="pure-form pure-form-aligned" action="includes/add_product.inc.php" method="POST" enctype='multipart/form-data'>
                            <fieldset>
                        
                                <div class="pure-control-group">
                                    <b>Product status</b><br>
                                    <input type="radio" id="aligned-name" name="productstatus" value="1" checked> Enable
                                    <input type="radio" id="aligned-name" name="productstatus" value="0" > Disable
                                    <span class="pure-form-message-inline"></span>
                                </div>

                                <p><br></p>
                                <div class="form-group row">
                                    <label for="productname" class="col-sm-4 col-form-label">Productname</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" required="" id="aligned-name" name="productname" placeholder="required">
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="productdescription" class="col-sm-4 col-form-label">Product description</label>
                                        <div class="col-sm-6">
                                        <input type="text" class="form-control" required="" id="aligned-name" name="productdescription" placeholder="required..." />
                                        </div>
                                </div>
                        
                            

                                <div class="form-group row"> 
                                    <label for="priceexvat" class="col-sm-4 col-form-label">Price ex. VAT</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" required="" id="aligned-name" name="priceexvat" placeholder="required">
                                        </div>

                                </div>

                                <div class="form-group row">
                                    <label for="deliverytime"  class="col-sm-4 col-form-label">Deliverytime</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" required="" id="aligned-name" name="deliverytime" placeholder="required..." />
                                        </div>
                                </div>
                        </div>                    
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-10 custom-box">
                        <div class="boxinside-one"> 

                                                <div class="pure-control-group">
                                                   <b>Keep track of stock</b><br>
                                                    <input type="radio" id="aligned-name" name="keeptrackofstock" value="1" checked/> Yes
                                                    <input type="radio" id="aligned-name" name="keeptrackofstock" value="0" /> No
                                                    <span class="pure-form-message-inline"></span>
                                                </div>
                                                <br>
                                                <div class="pure-control-group">
                                                    <b>Allow purchase when stock is empty</b><br>
                                                    <input type="radio" id="aligned-name" name="allowpurchasewhenempty" value="1" checked/> Yes
                                                    <input type="radio" id="aligned-name" name="allowpurchasewhenempty" value="0" /> No
                                                    <span class="pure-form-message-inline"></span>
                                                </div>

                                                

                                                <p><br></p>

                                                <div class="form-group row">
                                                        <label for="itemnumber"  class="col-sm-4 col-form-label">Item number</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" required="" id="aligned-name" name="itemnumber" placeholder="required..." />
                                                        </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="category"  class="col-sm-4 col-form-label">Category</label>
                                                    <div class="col-sm-6">

                                                                                                        
                                                        
                                                        <select class="form-control" id="categorySelector" name="category" required>
                                                        <option selected disabled></option>
                                                        <!-- Getting data from database and using it for dropdown menu -->
                                                                            <?php
                                                                                
                                                                                $categories = $products->getCategories($database);
                                                                                
                                                                                foreach($categories as $item){?>
                                                                                <option><?php echo $item['cat'] . "</option>"; 
                                                                            }?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>    
                                                                
                                                
                                                
                                                    <div class="form-group row">
                                                            <label for="howmanyareinstock"  class="col-sm-4 col-form-label">How many are in stock</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" required="" id="aligned-name" name="howmanyareinstock" placeholder="required..." />
                                                            </div>
                                                    </div>

                                                    <div class="form-group row">
                                                            <label for="weight"  class="col-sm-4 col-form-label">Weight in gram</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="aligned-name" name="weight" />
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <label for="costprice"  class="col-sm-4 col-form-label">Costprice</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="aligned-name" name="costprice"/>
                                                            </div>
                                                    </div>

                                                    <div class="form-group row">
                                                            <label for="expenses"  class="col-sm-4 col-form-label">Expenses for each product</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="aligned-name" name="expenses"/>
                                                            </div>
                                                    </div>

                                            

                                    
                                                    <div class="pure-control-group"><b>Your notes</b><br>
                                                        <textarea class="aligned-name col-sm-10" name="yournotes" placeholder=""></textarea>                          
                                                    </div>
                        </div> 
                    </div>                                                                    
                </div>
                <!--end of content 1-->
                        
                

                <!--Content 2-->
                <div class="row">
                    <div class="col-md-10">
                        <div class="boxinside-one">    
                                                    <div class="pure-control-group">
                                                        <label for="aligned-name" ><b>Upload images</b></label><br>
                                                        <input type='file' name='pic[]' id='file' multiple ><br>
                                                    </div>

                                                    <p><br></p>
                                                    
                                                    <button type="submit" name="submit" value="upload" class="btn btn-success">Create product</button>
                                                    </form>
                                                
                                                
                        </div> 
                    </div>
                </div>
                <!--end of content 2-->
                       
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