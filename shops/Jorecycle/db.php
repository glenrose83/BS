
    <?php
        $host = 'localhost';
        $db   = 'Jorecycle_4081779016828793';
        $user = 'JoJonasen_4081779016828793';
        $pass = 'JayFooD_8299';
        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    