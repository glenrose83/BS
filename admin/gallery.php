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
 <link rel="stylesheet" href="../css/mystyle.css">
</head>

<body>

<div class="container-fluid full_size divbottombg">
<div class="topbg"></div>

    <div class="row">

        <!--menu-->
        <div class="col-md-3">
            <?php include_once 'includes/menu.php' ?>
        </div>

        <div class="col-md-9"> 
            <div class="header">
            
            <!--Site menu-->
            <div class="container-fluid ">
            <img src="../img/bg-scaleup.png" class="bgimage" alt="..." />
                <div class="row">
                             <div class="col-12 left-title">
                            <h1>Administration<br></h1>
                            </div>
                            <a href="edit_product.php?id=<?php echo $id;?>">Go back</a>
                </div>            
                        

                
            

                <?php
                    //Fetch all images from DB
                    $stmt = $pdo->prepare("SELECT * FROM product_images WHERE fk_id=$id");
                    $stmt->execute(); 
                    $images = $stmt->fetchALL();
                ?>

                <div class="row">
                <form class="pure-form pure-form-aligned" action="includes/upload_pictures.inc.php?id=<?php echo $id?>" method="POST" enctype='multipart/form-data'>
                <div class="pure-control-group">
                <label for="aligned-name" >Upload images</label><br>
                <input type='file' name='pic[]' id='file' multiple ><br>
                </div>

                <p><br></p>                            
                <button type="submit" name="submit" value="upload" class="btn btn-success">Upload picture</button>
                </form>
                <p><br></p>   
                
                
                
                
                
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
                        foreach ($images as $picture){
                            echo"
                            <div class='col-md-4'>
                                <img class='cuz_gallery' src='".$picture['url']."'>
                            
                                <h6><b>".$picture['name']."</b></h6>
                            
                                 <p>
                                <!--checking if its frontpage picture-->";

                                if ($picture['primary_pic'] == 1) {  
                                    echo "<button type='button' class='btn-sm btn-light' disabled>Frontpage picture</button><br>";                                      
                                } else {
                                    echo "<a href='includes/set_primary_pic.inc.php?id=".$picture['id']."&requestpage=".$_GET['id']."'><button type='button' class='btn-sm btn-secondary'>Select as frontpage picture</button></a><br>";
                                }
                            
                            echo "<!--button to delete picture-->
                            <a href='includes/delete_pic.inc.php?id=".$picture['id']."&requestpage=".$_GET['id']."'><button type='button' class='btn-sm btn-danger'>Delete picture</button></a>
                            
                            </p>
                            </div>";
                        }
                    ?>
                    
                                    
                </div>
                

        



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