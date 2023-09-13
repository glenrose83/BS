<?php
include_once '../../bootstrap.php';

if(isset($_GET['delete_product'])){

    //Run code below if GET isset and GET is "delete product"
    $id = $_GET['delete_product'];
    $sanitized_id = filter_input(INPUT_GET, 'delete_product', FILTER_SANITIZE_NUMBER_INT);

    delete_product($sanitized_id, $pdo);

    header('Location: ../manage_products.php?status=product_deleted');

}
