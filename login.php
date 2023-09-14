<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
    <title>Responsive Side Menu &ndash; Layout Examples &ndash; Pure</title>
    <link rel="stylesheet" href="admin/css/pure-min.css">
    <link rel="stylesheet" href="admin/css/styles.css">
</head>
<body>

<div id="layout">
    

    <div id="main">
        <div class="header">
            <h1>Please log in test</h1>
            <h2>Administration</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">Please fill out your information:</h2>
            
            <form action="includes/login.inc.php" method="POST">
            Type your username:  <br><input type="text" name="username" placeholder="Username"></input><br><br>
            
            Type your password: <br><input type="password" name="password"  placeholder="Password"></input><br><br>
            
            <button type="submit">Login</button>
            </form>
        </div>
    </div>
</div>



</body>
</html>