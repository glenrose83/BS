<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
    <title>Responsive Side Menu &ndash; Layout Examples &ndash; Pure</title>
   
    <!--adding bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <!--adding my own style-->
     <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>

<div class="container-fluid bg">
       
        <div class="col-md-12">
            <!-- title -->
            <div class="cus-title-midscreen">
            <h1>Administration Login</h1>
            </div>

                
                <!-- content -->
                <div class="cus-text-midscreen">
                             
                <form action="includes/login.inc.php" method="POST">
               <b>Type your username:</b>  <br><input type="text" name="username" placeholder="Username" style="margin-top: 5px;"></input><br><br>
                <br>
               <b>Type your password:</b> <br><input type="password" name="password"  placeholder="Password" style="margin-top: 5px;"></input><br><br>
                
                <button type="submit" class="btn btn-success">Login</button>
                </form>
            </div>
        </div>

</div>

<!--Javascript used by bootstrap-->
<script src="js/bootstrap.bundle.min.js"></script>  
</body>
</html>