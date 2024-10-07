
        <?php 
        class DatabaseShop {

            public $connection;

            private $servername = 'localhost';
            private $username = 'KasperNyholm_16254832497326008';
            private $password = 'JayFooD_4508';
            private $databasename = 'NyholmsShop_16254832497326008';
            

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
    