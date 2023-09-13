<?php

class settings extends DB {

    public $companyname;
    public $address;
    public $zip;
    public $city;
    public $country;
    public $email;
    public $phone;
    public $shopname;
    private $username;
    private $hashedUserpassword;
    private $role;
    public $vat;

    public $status;
    public $description;
    public $price;
    public $shippingTime;
    public $shippingID;


    public function __construct(){
        
        //getting data for information
        $stmt = $this->connect()->prepare(
        'SELECT * FROM users;'
        );
        $stmt->execute();
        $settings = $stmt->fetch();
        
        $this-> companyname = $settings['companyname'];
        $this-> address = $settings['address'];
        $this-> city = $settings['city'];
        $this-> country =$settings['country'];
        $this-> email = $settings['email'];
        $this-> phone = $settings['phone'];
        $this-> shopname = $settings['shopname'];
        $this-> username = $settings['username'];
        $this-> hashedUserpassword = $settings['userpassword'];
        $this-> role = $settings['role'];
        $this-> vat = $settings['vat'];
        $this-> zip = $settings['zip'];

       

    }



   

    


} 