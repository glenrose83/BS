<?php session_start(); 
include_once 'bootstrap.php';
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    //Google tracking code
    //IF constant with GA4STATUS is TRUE - run this
    if(GA4STATUS) {  
        $main = new Main();
        echo $main->getData();
        }
    ?>

<title>Basic Shop - Free Webshops To The People</title>

<!--adding my own style-->
<link rel="stylesheet" href="../../css/mystyle.css">
    <!--adding bootstrap-->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
<header>
    <?php 
    include_once '../../templates/basic/header.php'; 
    ?>
    </header>

    <main>

    <?php 
    include_once '../../templates/basic/main.php' ?>
    </main>

    <footer>
    <?php 
    include_once '../../templates/basic/footer.php' ?>
    </footer>

<!--Javascript used by bootstrap-->
<script src="../../js/bootstrap.bundle.min.js"></script>       
</body>
</html>
