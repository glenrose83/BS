
        <?php 
        class DatabaseShop {

            public $connection;

            private $servername = 'localhost';
            private $username = 'malenethree_17648133398706333';
            private $password = 'JayFooD_1385';
            private $databasename = 'Mathree_17648133398706333';
            

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
    