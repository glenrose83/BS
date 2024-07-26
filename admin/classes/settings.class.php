<?php
class Settings{

    //Construct that is the first thing instatiation does  
    public function __construct($db_access,$id){

        //assigns db access to property
        self::$connection=$db_access->connection;
        
        //populates CONST`s
        $this->get_const_data($id);

    } 

     


    //DB connection
    private static $connection;

    //properties used
    public $shopname;
    public $companyname;
    public $address;
    public $city;
    public $country;
    public $vat;
    public $email;
    public $phone; 
    public $id;

    //Used to put data in CONST`s

    private function get_const_data($id){

        $stmt = self::$connection->prepare("SELECT * FROM `users` where id=$id;");
        $stmt->execute();
        $data_array= $stmt->fetch();

        //assigning data to properties
        $this->shopname = $data_array['shopname'];
        $this->companyname = $data_array['companyname'];
        $this->address = $data_array['address'];
        $this->city = $data_array['city'];
        $this->country = $data_array['country'];
        $this->vat = $data_array['vat'];
        $this->email = $data_array['email'];
        $this->phone = $data_array['phone'];
        $this->id = $id;
        

    } 

    public function fetchALL_data_from_col($col){
        $stmt = self::$connection->prepare("SELECT * FROM $col");
        $stmt->execute();
        return $stmt->fetchALL();
    }

    public function fetch_data_from_col($col){
        $stmt = self::$connection->prepare("SELECT * FROM $col");
        $stmt->execute();
        return $stmt->fetch();
    }


   
}

?>