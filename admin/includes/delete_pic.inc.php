<?php
session_start();
include_once '../../bootstrap.php';

if(isset($_GET['id'])){
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    

    //Delete picture in DB
    delete_picture($id,$pdo);
    

    Header('Location: ../gallery.php?id='.$_GET['requestpage'].'&status=picture_deleted');


    } else {

    Header('Location: ../index.php');
}