<?php
/* session_start();
include_once '../../bootstrap.php';


if(isset($_GET['status'])){

    //Run code below if GET isset and GET is "delete product"
    $sanitized_status = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_STRING);
    $sanitized_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    //Changing status in DB
    change_orderstatus($sanitized_id, $sanitized_status, $database->connection);

    header('Location: ../orders.php?status=changed');

} else {

    header('Location: ../index.php');
}

 */