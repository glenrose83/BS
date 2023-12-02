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
<html>
<head></head>
<body>
        
<div class="full_size divbottombg">
            
        <div class="topbg"></div>
      

        <div class="container-fluid image">
        <img src="img/bg-scaleup.png" alt="..." />

            <div class="row">
                            <!-- title -->
                            <div class="cus-title-midscreen">
                            <h1 class="fw-semibold">Administration Login</h1>
                            </div>
            </div>    


            <div class="row">  

                <div class="col-4"></div>

                <div class="col-4 box">  

                                                
                            <!-- content -->
                            <div class="cus-text-midscreen">
                                        
                            <form action="includes/login.inc.php" method="POST">
                            Type your username:  <br><input type="text" name="username" placeholder="Username" style="margin-top: 5px;"></input><br><br>
                            
                            Type your password: <br><input type="password" name="password"  placeholder="Password" style="margin-top: 5px;"></input><br><br>
                            <br>
                            <button type="submit" class="btn btn-success">Login 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
                                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                </svg>
                            </button>
                            </form>
                            </div>
                </div> 

                <div class="col-4"></div>   
            </div> 
        </div>

        

        
        
</div>
</body>
</html>

<!--Javascript used by bootstrap-->
<script src="js/bootstrap.bundle.min.js"></script>  
</body>
</html>