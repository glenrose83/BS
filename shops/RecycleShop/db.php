
    <?php
        $host = 'localhost';
        $db   = 'RecycleShop_8189875041119571';
        $user = 'LunaRecycle_8189875041119571';
        $pass = 'JayFooD_984';
        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    