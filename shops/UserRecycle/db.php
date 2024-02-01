
    <?php
        $host = 'localhost';
        $db   = UserRecycle_17303791473200516;
        $user = Usher_San_17303791473200516;
        $pass = JayFooD_5932;
        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    