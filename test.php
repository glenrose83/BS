<?php    
include_once 'bootstrap.php';

//IF constant with GA4STATUS is enabled
$main = new Main();
$main->getData();
echo $main->ga4code;