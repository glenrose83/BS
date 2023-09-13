<?php

//sanitize input
$option = filter_input(INPUT_POST, 'option', FILTER_SANITIZE_STRING);

$_SESSION['delivery'] = $option;

?>

<p><br></p>
<h1>Choose payment method</h1>
<p><br></p>
<form action="order_completed_design.php" method="POST">
    <div class="form-check">
    <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="creditcard" checked>
    <label class="form-check-label" for="exampleRadios1">
        Creditcard
    </label>
    <br>-Deliverytime is 5-10 days
    </div>
<br>
    <div class="form-check">
    <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="Wire transfer">
    <label class="form-check-label" for="exampleRadios2">
        Wiretransfer
    </label>
    <br>-Deliverytime 1-2 days
    </div>
<br>
    <div class="form-check">
    <input class="form-check-input" type="radio" name="payment" id="exampleRadios3" value="store">
    <label class="form-check-label" for="exampleRadios3">
        In our store at pickup
    </label>
    <br>-Pick up at our adress
    </div>
    
    <p><br></p>
    <button type="submit" class="btn btn-primary">Pay your order</button>

</form>