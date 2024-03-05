<?php

    function handle_color($status){
        if ($status == "not handled"){
            $status = "<p class='text-danger'>Not Handled</p>";
        } elseif (
            $status == "processed"){
            $status = "<p class='text-success'>Processed</p>";
        } elseif (
            $status == "in progress"){
            $status = "<p class='text-warning-emphasis'>In Progress</p>";
        }

        return $status;
    }

    function get_userinfo($username,$pdo){

             $data=[
            'username' => $username
             ];
    
    $sql = "Select * FROM users WHERE username = :username";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
    $stmt = $stmt->fetch();
    return $stmt;
    }


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

        //Deleting row from DB.
        $sql = "DELETE FROM product_images WHERE id = :id";
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);
    

        
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

       function findPendingOrders($pdo) {

        $data =[
            'status' => 'not handled'
        ];

        $sql = "SELECT COUNT(id) FROM orders WHERE status = :status";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $isPending = $stmt->fetch();
        return $isPending[0];
    }