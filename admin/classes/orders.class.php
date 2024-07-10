<?php

class Orders{

    public static function FindPendingOrders($database){
        
        $data =[
            'status' => 'not handled'
        ]; 
   

    $sql = "SELECT * FROM `orders`";
    $stmt = $database->connection->prepare($sql);
    $stmt->execute();
    $isPending = $stmt->fetchALL();
    return $number=count($isPending);
    }


}



