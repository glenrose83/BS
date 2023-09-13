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
            <h1>Start now, register you webshop for free </h1>
            <h2>No creditcard, no commitment - It is free</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">Please fill out your information:</h2>
            
            <form action="includes/registration.inc.php" method="POST">
            Type your username:  <br><input type="text" name="userName" placeholder="Username"></input><br><br>
            Whats the name of your shop: <br><input type="text" name="shopName" placeholder="Shopname"></input><br><br>
            What´s your current email: <br><input type="email" name="userEmail" placeholder="Email"></input><br><br>
            Type a password you wish: <br><input type="password" name="passwordOne"  placeholder="Password"></input><br><br>
            Type the same password again: <br><input type="password" name="passwordTwo" placeholder="Password"></input><br><br>
            <button type="submit">Start Your Webshop</button>
            </form>
        </div>
    </div>
</div>

<script src="/js/ui.js"></script>

</body>
</html>