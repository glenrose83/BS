
    <?php
        $host = 'localhost';
        $db   = 'AlbasShopper_9138445560450880';
        $user = 'AlbaRose_9138445560450880';
        $pass = 'JayFooD_3452';
        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    