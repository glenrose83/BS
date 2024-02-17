<?php
session_start();
include_once '../bootstrap.php'; 

if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
} else {
    header('Location: ../login.php?error=pleaselogin');
}

//Getting Id
$stmt = $pdo->prepare(
    "SELECT id FROM users"
    );
    $stmt->execute();
    $id = $stmt->fetch();
    echo "this is the userid: " . $id;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Set your settings in Basic Webshop Administration">
    <title>Basic Webshop - Change information</title>
   
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
                    <div class="col-md-12 left-title">
                        <h1>Administration</h1>
                        <h2>Change your info</h2>
                    </div> 
                </div>

            
                <!--//Table with products-->
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="boxinside-one">
                            <form action="includes/change_info.inc.php?id=<?php echo $id; ?>" method="POST">
                                
                                <div class="col-md-12">
                                    <label for="Companyname" class="form-label">Companyname:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="companyname">
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label for="Address" class="form-label">Address:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="address">
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label for="City" class="form-label">City:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="city">
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label for="Country" class="form-label">Country:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="country">
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label for="VAT" class="form-label">VAT:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="vat">
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label for="Email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label for="Phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="phone">
                                </div>
                                <br>
                                <center><button type="submit" class="btn btn-primary">Change info</button></center>
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


