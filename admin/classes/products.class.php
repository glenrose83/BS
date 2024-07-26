<?php 

class Products{

 

public function getCategories($database){

    //fills out category on add product page.   should only be a method NOT construct
    $sql = "SELECT * FROM `categories`";
    $stmt= $database->connection->prepare($sql);
    $stmt->execute();    
    $result = $stmt->fetchALL(); 
    return $result;
    }

}