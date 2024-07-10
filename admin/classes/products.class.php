<?php 

class Products{

public $categories;

public function __construct($database){

    $sql = "SELECT * FROM categories";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute();
    
    $this->categories = $stmt->fetchALL(); 

}
}