<?php
session_start();
include_once '../bootstrap.php'; 

//GET id from url  and Fetch product from DB
$sanitized_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$stmt = $pdo->prepare("SELECT * FROM products WHERE id=$sanitized_id");
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

$info = new settings;
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
                    <div class="col-md-11 custom-box">
                        <form class="pure-form pure-form-aligned" action="includes/change_settings.inc.php" method="POST" enctype='multipart/form-data'>
                            

                                <div class="form-group row">
                                        <label for="itemnumber"  class="col-sm-2 col-form-label">Shopname</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="aligned-name" name="shopname" value="<?php echo $info->shopname;?>" />
                                            </div>
                                </div>

                                <div class="form-group row">
                                        <label for="itemnumber"  class="col-sm-2 col-form-label">Companyname</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="aligned-name" name="companyname" value="<?php echo $info->companyname;?>" />
                                            </div>
                                </div>

                                <div class="form-group row">
                                        <label for="itemnumber"  class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="aligned-name" name="address" value="<?php echo $info->address;?>" />
                                            </div>
                                </div>

                                <div class="form-group row">
                                        <label for="itemnumber"  class="col-sm-2 col-form-label">City</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="aligned-name" name="city" value="<?php echo $info->city;?>" />
                                            </div>
                                </div>

                                <div class="form-group row">
                                        <label for="itemnumber"  class="col-sm-2 col-form-label">Country</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="aligned-name" name="country" value="<?php echo $info->country;?>" />
                                            </div>
                                </div>

                                <div class="form-group row">
                                        <label for="itemnumber"  class="col-sm-2 col-form-label">VAT</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="aligned-name" name="vat" value="<?php echo $info->vat;?>" />
                                            </div>
                                </div>

                                <div class="form-group row">
                                        <label for="itemnumber"  class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="aligned-name" name="email" value="<?php echo $info->email;?>" />
                                            </div>
                                </div>

                                <div class="form-group row">
                                        <label for="itemnumber"  class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="aligned-name" name="phone" value="<?php echo $info->phone;?>" />
                                            </div>
                                </div>
                                                              
                                <p><br></p>                                   
                                <button type="submit" name="submit" value="upload" class="btn btn-success">Submit Changes</button>                                                
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