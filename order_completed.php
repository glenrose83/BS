<?php 
//sanitize input
$payment = filter_input(INPUT_POST, 'payment', FILTER_SANITIZE_STRING);

//assigning values to varibles
$delivery = $_SESSION['delivery'];
$lastid = $_SESSION['last_id'];
$status = 'not handled';
$order_date = date("Y.m.d - H.i"); 
$total_price = $_SESSION['ordertotal'];


//Inserting data into orders
$data = [
    'fk_customer' => $lastid, 
    'order_date' => $order_date,
    'payment' => $payment,
    'delivery' => $delivery,
    'status' => $status,
    'total_price' => $total_price
   
];
$sql = "INSERT INTO orders (fk_customer, order_date, payment_method, delivery_method, status, total_price) 
VALUES (:fk_customer, :order_date, :payment, :delivery, :status, :total_price)";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);

$last_id_orders= $pdo->lastInsertId();

//Inserting products into ordered_products
$count = count($_SESSION['cart']);                

for ($x = 0; $x < $count; $x++) {

    $data = [
        'fk_orders' => $last_id_orders,
        'item' => $_SESSION['cart'][$x]['itemID'],
        'qty' => $_SESSION['cart'][$x]['quantity'],   
        'price' => $_SESSION['cart'][$x]['item_price'],
        'name' => $_SESSION['cart'][$x]['item_name']
    ];
    $sql = "INSERT INTO ordered_products (fk_orders, item, qty, price, name) 
    VALUES (:fk_orders, :item, :qty, :price, :name)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);


}


//clearing cart
session_unset();
?>



<p><br></p>
<h1> Order placed</h1>
<h4>Thank you for your order</h4>