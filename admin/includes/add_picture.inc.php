<?php
session_start();
include_once '../../includes/db_connection.php';


//here we get the last inserted current product id
$product_id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);    



//Uploading files and add URL to DB
if(isset($_POST['submit'])){

        if(isset($_FILES['pic'])){
          
            $filecount = count($_FILES['pic']['name']);
      
        

            if($filecount >= 1){
               
               
                 $uploads_dir = "img";


                 for($i=0; $i < $filecount; $i++){
                        
                    $tmp_name = $_FILES['pic']['tmp_name'][$i];
                    $name = basename($_FILES['pic']['name'][$i]);
                    $url = $_FILES['pic']['name'][$i];
                  
                    
                            if(move_uploaded_file($tmp_name, "../$uploads_dir/$name")){
                                                             
                                // Inserting images to DB with relational table product_images 
                                $data=[
                                        'fk_products' => $product_id,
                                        'name' => $name,
                                        'url' => "img/" .$url
                                ];

                                $sql = "INSERT INTO product_images (fk_id, name, url) VALUES (:fk_products, :name, :url)";
                                $stmt= $pdo->prepare($sql);
                                $stmt->execute($data);

                                                       

                            }  
                }
           } 
        }
    
}    



Header('Location: ../edit_product.php?id='.$product_id.'&status=image_added');
