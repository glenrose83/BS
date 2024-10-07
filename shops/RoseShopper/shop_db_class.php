
        <?php 
        class DatabaseShop {

            public $connection;

            private $servername = 'localhost';
            private $username = 'KarinRose_14008368557440297';
            private $password = 'JayFooD_2988';
            private $databasename = 'RoseShopper_14008368557440297';
            

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
    