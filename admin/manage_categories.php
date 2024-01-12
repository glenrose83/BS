<?php
session_start();

if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
} else {
    header('Location: ../login.php?error=pleaselogin');
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

<div class="container-fluid height image">

    <div class="row">

        <div class="col-md-3">
            <?php include_once 'includes/menu.php' ?>
        </div>

        <div class="col-md-9"> 

            <div class="container-fluid image">
            <img src="../img/bg-scaleup.png" alt="..." />
    
                
                
                <div class="row">
                    <div class="col-md-12 title">
                        <h1>Administration</h1>
                        <h2>Manage Categories</h2>
                    </div> 
                </div>
                        
                       
                <div class="row">                  
                    

                    <div class="col-md-12 custom-box">

                        <div class="boxinside-one">
                        
                            <form class="pure-form pure-form-aligned" action="includes/add_category.inc.php" method="POST" enctype='multipart/form-data'>
                                <div class="form-group row">
                                        <label for="productname" class="col-sm-2 col-form-label">Add a category: </label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" required="" id="aligned-name" name="category" placeholder="Type something...">
                                            <br><button type="submit" name="submit" value="upload" class="btn btn-success">Add category</button> 
                                        </div>
                                    </div>
                                    
                            </form><br>
                            

                            <p><h6><br><b>Categories:<h6></b></h6></p>
                            <p class='fs-6'>
                                
                            <?php
                                $stmt = $pdo->prepare("SELECT * FROM categories");
                                $stmt->execute(); 
                                $categories = $stmt->fetchALL();

                                foreach ($categories as $category) {
                                    echo $category['cat']. " <== <a  class='text-danger' href='includes/delete_category.inc.php?id=".$category['id']."'>Delete</a><br>";
                                }
                            ?>       
                                </p>
                        </div>        
                       
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