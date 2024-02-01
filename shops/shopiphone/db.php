
    <?php
        $host = 'localhost';
        $db   = 'shopiphone_66463762944129';
        $user = 'Ipones_66463762944129';
        $pass = 'JayFooD_7053';
        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    