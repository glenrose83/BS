
    <?php
        $host = 'localhost';
        $db   = dsadsdasdasda_15872548007475295;
        $user = jan333_15872548007475295;
        $pass = JayFooD_1458;
        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    