
    <?php
        $host = 'localhost';
        $db   = TomsRecycle_16295972952428745;
        $user = TomsChokolade_16295972952428745;
        $pass = JayFooD_8250;
        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    