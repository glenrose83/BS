
    <?php
        $host = 'localhost';
        $db   = 'Glenschokoladeshop_20468678867142328';
        $user = 'GlenChokolade_20468678867142328';
        $pass = 'JayFooD_6802';
        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    