<?php
    declare(strict_types = 1);
    include 'includes/class-autoload.inc.php';
?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="includes/calc.inc.php" method="post">
        <p>My own calculator</p>
        <input type="number" name="num1" placeholder="First Number">
        <select name="oper">
            <option value="add">addition</option>
            <option value="sub">subtraction</option>
            <option value="div">division</option>
            <option value="mul">multiplaction</option>
        </select>
        <input type="number" name="num2" placeholder="Second number">
        <button type="submit" name="submit">calculate</button>
    </form>


</body>
</html>