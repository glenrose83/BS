
        <?php 
        class DatabaseShop {

            public $connection;

            private $servername = 'localhost';
            private $username = 'Glenfino_13745185472163194';
            private $password = 'JayFooD_1060';
            private $databasename = 'FinoShop_13745185472163194';
            

            public function __construct() {


                try {
                    $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->databasename", $this->username, $this->password);
                    // set the PDO error mode to exception
                    $this->connection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                } catch(PDOException $e) {
                    echo 'Connection failed: ' . $e->getMessage();
                }
            }
        }
    