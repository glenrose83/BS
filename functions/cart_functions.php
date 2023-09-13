<?php

//searching session for ID and returning key
function searchForId($id, $array) {
    foreach ($array as $key => $val) {
        if ($val['itemID'] === $id) {
            return $key;
        }
    }
    return null;
 }

 function ukSubtotal() {
   
    $count = count($_SESSION['cart']);      
    $subtotal=0;            

    for ($x = 0; $x < $count; $x++) {
    $subtotal += $_SESSION['cart'][$x]['item_price'];
    }

        return $subtotal;

 }

 function Vat($subtotal) {
    
    $vat = $subtotal * 0.20;
    return $vat;
 }

 function Ordertotal($subtotal) {
    $OrderTotal = $subtotal * 1.20;
    return $OrderTotal;
 }

 