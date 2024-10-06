
        <?php 
        class Database {

            public $connection;

            private $servername = 'localhost';
            private $username = 'malenetwo_16936198268162961';
            private $password = 'JayFooD_4805';
            private $databasename = 'MaTwo_16936198268162961';
            

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
    