<?php
session_start();
include_once '../../includes/db_connection.php';

// //Checking and sanitizing input data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$product_id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);    
$productstatus = filter_input(INPUT_POST,'productstatus', FILTER_SANITIZE_NUMBER_INT);
$productname = filter_input(INPUT_POST,'productname', FILTER_SANITIZE_STRING);
$productdescription = filter_input(INPUT_POST,'productdescription', FILTER_SANITIZE_STRING);
$priceexvat = filter_input(INPUT_POST,'priceexvat', FILTER_SANITIZE_NUMBER_INT);
$costprice = filter_input(INPUT_POST,'costprice', FILTER_SANITIZE_NUMBER_INT);
$expenses = filter_input(INPUT_POST,'expenses', FILTER_SANITIZE_NUMBER_INT);
$itemnumber = filter_input(INPUT_POST,'itemnumber', FILTER_SANITIZE_STRING);
$category = filter_input(INPUT_POST,'category', FILTER_SANITIZE_STRING);
$deliverytime = filter_input(INPUT_POST,'deliverytime', FILTER_SANITIZE_STRING);
$howmanyinstock = filter_input(INPUT_POST,'howmanyareinstock', FILTER_SANITIZE_NUMBER_INT);
$keeptrackofstock = filter_input(INPUT_POST,'keeptrackofstock', FILTER_SANITIZE_NUMBER_INT);
$allowpurchasewhenempty = $_POST['allowpurchasewhenempty'];
$weight = filter_input(INPUT_POST,'weight', FILTER_SANITIZE_NUMBER_INT);
$yournotes = filter_input(INPUT_POST,'yournotes', FILTER_SANITIZE_STRING);
} else {
    header('Location: ../manage_products.php');
}


//Validating Input data
if (empty($productname || $priceexvat || $deliverytime || $itemnumber || $category || $product_id )){
    header('Location: ../manage_products.php?error=emptyfields');
} 

//variables dosent seem to work
$data = [
    'productstatus' => $productstatus,
    'productname' => $productname,
    'productdescription' => $productdescription,
    'pricesxvat' => $priceexvat,
    'costprice' => $costprice,
    'expenses' => $expenses,
    'item' => $itemnumber,
    'category' => $category,
    'deliverytime' => $deliverytime,
    'howmanyinstock' => $howmanyinstock,
    'keeptrackofstock' => $keeptrackofstock,
    'allowpurchasewhenempty' => $allowpurchasewhenempty,
    'weight' => $weight,
    'yournotes' => $yournotes,
    'setimage' => 0
];

$sql = "INSERT INTO products (productstatus, productname, productdescription, pricesxvat, costprice, expenses, item, category, deliverytime, howmanyinstock, keeptrackofstock, 
allowpurchasewhenempty, weight, yournotes, image) 
VALUES 
(:productstatus, :productname, :productdescription, :pricesxvat,:costprice, :expenses, :item, :category, :deliverytime, :howmanyinstock, :keeptrackofstock, :allowpurchasewhenempty, :weight, 
:yournotes, :setimage)";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);


// //here we get the last inserted ID that we use in the INSERT below
$last_id= $pdo->lastInsertId();



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
                                        'fk_products' => $last_id,
                                        'name' => $name,
                                        'url' => "img/" .$url
                                ];

                                $sql = "INSERT INTO product_images (fk_id, name, url) VALUES (:fk_products, :name, :url)";
                                $stmt= $pdo->prepare($sql);
                                $stmt->execute($data);

                                //inserting boolean in product table
                                $data=[
                                    'set' => 1,
                                    'id' => $last_id
                                
                                ];

                                $sql = "UPDATE products SET image=:set WHERE id=:id";
                                $stmt= $pdo->prepare($sql);
                                $stmt->execute($data);

                        

                            }  
                }
           } 
        }
    
}    



Header('Location: ../manage_products.php?status=product_added');
