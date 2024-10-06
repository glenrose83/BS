<?php
session_start();
include_once '../bootstrap.php'; 

//Check if user is logged in
User::isLoggedIn();

//intialising objects
$database = new Database;

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else { 
    echo "You are missing a id for which product to select"; 
    exit();
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
                                            <h1>Gallery<br></h1>
                                            <!--Alert--> 
                                        <center><span class="half-width"><?php echo Misc::alert(); ?></span></center>
                                        </div>
                            </div>            
                        </div>
                            
                </div>     

             
                <!--content 1-->                      
                <div class="row">
                    <div class="col-md-10 custom-box">
                        <div class="boxinside-one"> 


                        <?php
                            //Fetch all images from DB
                            $stmt = $database->connection->prepare("SELECT * FROM `product_images` WHERE fk_id=$id");
                            $stmt->execute(); 
                            $images = $stmt->fetchALL();
                            ?>                                  
                               
                
                
                        <div class="row">
                            <div class="col-md-12">
                            <a href="edit_product.php?id=<?php echo $id;?>"><--Go back</a>
                            </div>
                        </div>


                        <div class="row">
                                    <div class='col-md-2 gallery'>
                                        <center>
                                        
                                         <b>Upload images</b><br><br>
                                         
                                         <form class="pure-form pure-form-aligned" action="includes/upload_pictures.inc.php?id=<?php echo $id?>" method="POST" enctype='multipart/form-data'>
                                            <div class="pure-control-group">
                                        
                                        <input type='file' name='pic[]' id='file' multiple ><br>
                                        <br/>

                                                                                                
                                        <button type="submit" name="submit" value="upload" class="btn btn-success">Upload picture</button>
                                        </form>
                                        </center>
                                    </div>

                                <?php

                                foreach ($images as $picture){ 
                                ?>
                                    
                                    <div class='col-md-2 gallery'>
                                        <?php echo "<img src='".$picture['url']."'>"; ?>

                                        <div class="description-gallery"><h6><?php echo $picture['name'] ?></h6></div>

                                        <center>
                                        <!--checking if its Main picture-->
                                        <?php 
                                        if ($picture['primary_pic'] == 1) {  
                                            echo "<button type='button' class='btn-sm btn-primary' disabled>Main picture</button><br>";                                      
                                        } else {
                                            echo "<a href='includes/set_primary_pic.inc.php?id=".$picture['id']."&requestpage=".$_GET['id']."'><button type='button' class='btn-sm btn-secondary'>Set as main picture</button></a><br>";
                                        }

                                        ?>

                                        <!--button to delete picture-->
                                        <a href='includes/delete_pic.inc.php?id=<?php echo $picture['id']."&requestpage=".$_GET['id']?>'><button type='button' class='btn-sm btn-danger'>Delete picture</button></a>
                                        </center>


                                    </div>

                                   
                                    
       
                                <?php }?>
                                

                           

                        </div>    


                    
                    <p><br></p>  









                        </div>                    
                    </div>
                </div>

                <!--end of content 1-->
                     
                       
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