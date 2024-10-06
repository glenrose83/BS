
        <?php 
        class Database {

            public $connection;

            private $servername = 'localhost';
            private $username = 'Glentwo_19462104267815524';
            private $password = 'JayFooD_5940';
            private $databasename = 'twoshop_19462104267815524';
            

            public function __construct() {


                try {
                    $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->databasename", $this->username, $this->password);
                    // set the PDO error mode to exception
                    $this->connection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //echo 'Connected successfully';
                } catch(PDOException $e) {
                    echo 'Connection failed: ' . $e->getMessage();
                }
            }
        }
    