<?php

class HandleOrder extends DB {

            public $id;
            public $fullname;
            public $streetname;
            public $housenr;
            public $postcode;
            public $country;
            public $email;
            public $phone;
            public $status;
            public $order_date;
            public $payment_method;
            public $delivery_method;
            public $total_price;




    public function __construct($sanitized_id){


        //getting data for orderinfo
        $data=[
            'id' => $sanitized_id 
        ];

        $stmt = $this->connect()->prepare(
        'SELECT * 
        FROM customers   
        LEFT JOIN orders
        ON customers.id = orders.fk_customer;;'
        );
        $stmt->execute($data);
        $buyer = $stmt->fetch();
        
        $this-> id = $buyer['id'];
        $this-> status = $buyer['status'];
        $this-> order_date = $buyer['order_date'];
        $this-> payment_method = $buyer['payment_method'];
        $this-> delivery_method = $buyer['delivery_method'];
        $this-> total_price = $buyer['total_price'];
        $this-> fullname= $buyer['fullname'];
        $this-> streetname = $buyer['streetname'];
        $this-> housenr= $buyer['housenr'];
        $this-> postcode= $buyer['postcode'];
        $this-> country= $buyer['country'];
        $this-> email= $buyer['email'];
        $this-> phone= $buyer['phone'];

        return $buyer;
    }


    public function getProducts($sanitized_id){

        //getting purchased products
        $data=[
            'id' => $sanitized_id 
        ];
        $stmt = $this->connect()->prepare(
            'SELECT * 
            FROM ordered_products   
            WHERE fk_orders = :id'
            );

            $stmt->execute($data);
            $products = $stmt->fetchALL();

            return $products;        
        }

   

    


}