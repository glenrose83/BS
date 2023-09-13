<?php
session_start();
include_once '../bootstrap.php'; 

//GET id from url  and Fetch order from DB
$sanitized_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


//instantiating object and running the constuct
$buyer = new HandleOrder($sanitized_id);





//Checking if user has access
if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
        
} else {
    header('Location: ../login.php?error=pleaselogin');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">
    <title>Responsive Side Menu &ndash; Layout Examples &ndash; Pure</title>
   
  <!--adding bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!--adding my own style-->
 <link rel="stylesheet" href="css/mystyle.css">
</head>

<body>


<div class="container-fluid height">
    <div class="row height">

        <div class="col-md-2 admin-menu">
            <?php include_once 'includes/menu.php' ?>
        </div>

        <div class="col-md-10 "> 

            <div class="container-fluid">
                    
                <div class="row">
                    <div class="col-md-12">
                        <h1>Administration</h1>
                        <h2>Handle Order</h2>
                                            </div> 
                </div>

              
                <div class="row">
                   
                <div class="col-md-9 custom-box">

                    <!--nested container-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-10">
                                <?php 
                                //buyerinfo
                                echo "Ordernumber:<br>";
                                echo "<p class='fw-normal'>#" . $buyer->id . "</p><p></p>"; 
                                echo "Buyer:<br>";
                                echo "<p class='fw-normal'>".$buyer->fullname."<br>";
                                echo $buyer->streetname. " ". $buyer->housenr. "<br>";
                                echo $buyer->postcode."<br>";
                                echo $buyer->country."<br>";
                                echo "<br>";
                                echo $buyer->email."<br>";
                                echo $buyer->phone."<br></p>        ";
                                ?>
                            </div>    

                            <div class="col-md-2">
                                <?php 
                                //buyerinfo
                                echo "Order Info:<br>";
                                echo "<p class='fw-normal'>" . $buyer->payment_method . "<br>" 
                                .$buyer->delivery_method."</p>";
                                
                              
                                ?>
                           </div>   
                       </div>
                    </div>   



        
                   
                    <!--Show product purchased-->
                    <table class="table">
                    <thead>
                        <tr class="table-secondary">
                        <th scope="col">Itemnumber</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price ex.vat</th>
                        <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        
                        $products = $buyer->getProducts($sanitized_id);

                        foreach ($products as $product){
                          echo "<tr>
                           <th  scope='row'>".$product['Item']."</th>
                           <td>".$product['name']."</td>
                           <td>".$product['qty']."</td>
                           <td>".$product['price']."</td>
                           <td>".$product['total']."</td>                         
                           </tr>";
                        }
                    ?>
                        
                    </tbody>
                    <tfoot>
                    <tr class="table-light">
                        <th scope="row">Total </th>
                        <td></td>
                        <td></td>
                        <td>600 ex. vat</td>
                        <td>700 incl. vat</td>
                    </tfoot>
                    </table>


                    </div>

                    <div class="col-md-2 custom-box">
                    Actions:  <br><br>
                    <button type="button" class="btn btn-success">Complete Order<br>
                    <svg class="bi" width="24" height="24" fill="currentColor">
                        <use xlink:href="bootstrap-icons.svg#cash-coin"/>
                        </svg> 
                
                    </button>
                    <br><br>
                    
                    <button type="button" class="btn btn-secondary"  onclick="window.print()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print Order&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                    <svg class="bi" width="24" height="24" fill="currentColor">
                        <use xlink:href="bootstrap-icons.svg#printer"/>
                        </svg> 
                    </button>
                    <br><br>

                    <svg class="bi" width="24" height="24" fill="currentColor">
                        <use xlink:href="bootstrap-icons.svg#pin-angle"/>
                        </svg> Change status

                        <?php
                        //Fetch all products from DB
                        $data=[
                            'id' => $sanitized_id 
                        ];
                        $stmt = $pdo->prepare("SELECT * FROM orders
                        WHERE id =:id");
                        $stmt->execute($data); 
                        $orders = $stmt->fetch();
                    
                        ?>


                                <div class='dropdown'>
                                <a class='btn btn-light dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-expanded='false'>
                                <?php echo $orders['status']; ?>
                                </a>
                                <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                                    <a class='dropdown-item' href='includes/orders.inc.php?id=<?php echo $sanitized_id; ?>&status=unhandled'>Unhandled</a>
                                    <a class='dropdown-item' href='includes/orders.inc.php?id=<?php echo $sanitized_id; ?>&status=handled'>Handling</a>
                                    <a class='dropdown-item' href='includes/orders.inc.php?id=<?php echo $sanitized_id; ?>&status=completed'>Completed</a>
                                    <a class='dropdown-item' href='includes/orders.inc.php?id=<?php echo $sanitized_id; ?>&status=canceled'>Canceled</a>
                                    <a class='dropdown-item' href='includes/orders.inc.php?id=<?php echo $sanitized_id; ?>&status=failed'>Failed</a>
                                </div>
                        
                        
                   
                      
                        
                    </div>
                </div>


                 
                
            </div>
                                    
        </div>


        
    </div>
</div>

<!--Javascript and stuff-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>