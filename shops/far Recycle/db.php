
    <?php
        $host = 'localhost';
        $db   = 'bs';
        $user = 'root';
        $pass = '';
        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    