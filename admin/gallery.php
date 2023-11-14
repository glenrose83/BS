<?php
session_start();

if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
} else {
    header('Location: ../login.php?error=pleaselogin');
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else { 
    echo "You are missing a id for which product to select"; 
    exit();
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

            <div class="container">
                      
                <div class="row">
                    <div class="col">
                        <h1>Administration</h1>
                        <h2>Manage Products</h2>
                    </div> 
                </div>


                <?php
                    //Fetch all images from DB
                    $stmt = $pdo->prepare("SELECT * FROM product_images WHERE fk_id=$id");
                    $stmt->execute(); 
                    $images = $stmt->fetchALL();
                ?>

                <div class="row">
                    <?php
                        //success sign if status is picture_deleted
                        if(isset($_GET['status'])){
                            if($_GET['status'] == "picture_deleted"){
                                echo " <div class='alert alert-success' role='alert'>
                                Picture was deleted
                                </div>
                                
                </div><div class='row'>";
                            }
                        }

                        //showing images
                        foreach ($images as $image){
                            echo"
                            <div class='col-md-4'>
                            <img class='cuz_gallery' src='".$image['url']."'>
                            
                            <h6><b>".$image['name']."</b></h6>
                            
                            <p>
                                <!--checking if its primary picture-->";

                                if ($image['primary_pic'] == 1) {  
                                    echo "<button type='button' class='btn-sm btn-light' disabled>Primary picture</button><br>";                                      
                                } else {
                                    echo "<a href='includes/set_primary_pic.inc.php?id=".$image['id']."&requestpage=".$_GET['id']."'><button type='button' class='btn-sm btn-secondary'>Select as primary picture</button></a><br>";
                                }
                            
                            echo "<!--button to delete picture-->
                            <a href='includes/delete_pic.inc.php?id=".$image['id']."&requestpage=".$_GET['id']."'><button type='button' class='btn-sm btn-danger'>Delete picture</button></a>
                            
                            </p>
                            </div>";
                        }
                    ?>
                    
                                    
                </div>
                

        



        </div>


        
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>