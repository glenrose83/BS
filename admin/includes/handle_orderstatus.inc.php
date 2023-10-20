<?php
include_once '../../bootstrap.php';


// //Checking and sanitizing input data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);    
$status = filter_input(INPUT_POST,'status', FILTER_SANITIZE_STRING);

 echo "the status is: ".$status;
 echo "the id is: ".$id;
} 

