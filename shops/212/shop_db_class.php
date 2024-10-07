
        <?php 
        class DatabaseShop {

            public $connection;

            private $servername = 'localhost';
            private $username = 'Glen1_2657038344911469';
            private $password = 'JayFooD_2095';
            private $databasename = '212_2657038344911469';
            

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
    