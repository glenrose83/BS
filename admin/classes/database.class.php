<?php

class Database {

    public $connection;

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $databasename = "bs";
    

    public function __construct() {


        try {
            $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->databasename", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->connection ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    //Fetch data
    public function query($statement){
       
        $stmt = $this->connection->prepare($statement);
        $stmt->execute();
        return $result = $stmt->fetch();
        
    }


        //TO BE DELETED BEFORE PRODUCTION
    public function register(){
        $pass='abc';
        $id=43;

        //Hashing password
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

       
        $sql = "UPDATE `users` SET userpassword='$hashedPassword' WHERE id='$id'";
        $stmt= $this->connection->prepare($sql);
        $stmt->execute();

    }



}
