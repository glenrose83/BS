<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Basic Shop - Free Webshops To The People</title>

<!--adding my own style-->
<link rel="stylesheet" href="../../css/mystyle.css">
    <!--adding bootstrap-->
<link rel="stylesheet" href="../../css/bootstrap.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
include_once '../../bootstrap.php'; 
?>
</head>

<body>
    <header>
    <?php 
    include_once '../../templates/basic/header.php'; 
    ?>
    </header>

    <main>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
                   
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Sport</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Casual</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
    

    </div>
</nav>
<div class="container">    
<div class="col-md-1 ">
        </div>
        
        <div class="col-md-10 ">
            
              <?php include_once'../../delivery.php'; ?>

        </div>

        <div class="col-md-1 ">
        </div>
</div>   



    <footer>
    <?php 
       


    include_once '../../templates/basic/footer.php' ?>
    </footer>

<!--Javascript used by bootstrap-->
<script src="../../js/bootstrap.bundle.min.js"></script>       
</body>
</body>
</html>

