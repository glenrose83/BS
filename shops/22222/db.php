
    <?php
        $host = 'localhost';
        $db   = 22222_21047431168893321;
        $user = jan222_21047431168893321;
        $pass = JayFooD_4229;
        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    