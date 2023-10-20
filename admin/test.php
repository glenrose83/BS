".$sanitized_id."


// //Checking for GET-status og ID
if(isset($_GET['status'])){
    $status = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_NUMBER_INT);
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
          
        $data=[
           'status' => $status,
           'id' => $id
        ]
   

    //Updating the DB        
    $sql = "UPDATE orders SET status=:status WHERE id=:id";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);
    
    
    header('Location: ../handle_order.php?id=15');