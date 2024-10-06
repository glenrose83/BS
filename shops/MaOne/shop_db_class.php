
        <?php 
        class Database {

            public $connection;

            private $servername = 'localhost';
            private $username = 'maleneone_11613525409730528';
            private $password = 'JayFooD_6096';
            private $databasename = 'MaOne_11613525409730528';
            

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
    