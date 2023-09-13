<?php

    function delete_product($id,$pdo){
        $data=[
            'id' => $id,
    ];

    $sql = "DELETE FROM products WHERE id = :id";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);

    }

    function delete_picture($id,$pdo){

        $data=[
            'id' => $id,
         ];

        //deleting picturefile
        $sql = "SELECT url FROM product_images WHERE id = :id";
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
        $path = $stmt->fetch();
        unlink('../'.$path[0]);

        
    }


    
    
    function change_orderstatus($sanitized_id, $sanitized_status, $pdo){
        $data=[
            'id' => $sanitized_id,
            'status' => $sanitized_status
    ];

    $sql = "UPDATE orders SET status=:status WHERE id = :id";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);

    }

    function showProductimage($id,$pdo){
        
        $data=[
            'id' => $id,
        ];
        
          
        $stmt = $pdo->prepare("SELECT image FROM products WHERE id = :id");
        $stmt->execute($data); 
        $product = $stmt->fetch();
        $product = $product['image'];              
     
        if($product!=FALSE) {
            //if no image is set in db
            return "<a href='gallery.php?id=". $id . "'><img class='no_image_uploaded' src='../img/product_image.png'></a>";
            } else {
            return "<img class='no_image_uploaded' src='../img/no_product_image.png'>";    
            }
    }

    function findPendingOrders($pdo) {

        $data =[
            'status' => 'pending'
        ];

        $sql = "SELECT COUNT(id) FROM orders WHERE status = :status";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $isPending = $stmt->fetch();
        return $isPending[0];
    }