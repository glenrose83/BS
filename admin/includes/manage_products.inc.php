<?php
session_start();
include_once '../../bootstrap.php';
//Getting the right DB
include '../../shops/'. $_SESSION['shopname'] .'/shop_db_class.php';

$database = new DatabaseShop;

if(isset($_GET['delete_product'])){

    //Run code below if GET isset and GET is "delete product"
    $id = $_GET['delete_product'];
    $sanitized_id = filter_input(INPUT_GET, 'delete_product', FILTER_SANITIZE_NUMBER_INT);

    delete_product($sanitized_id, $database);

    header('Location: ../manage_products.php?status=product_deleted');

}
