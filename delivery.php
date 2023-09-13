<p><br></p>
<h1>Choose delivery method</h1>
<p><br></p>
<form action="payment_design.php" method="POST">
    <div class="form-check">
    <input class="form-check-input" type="radio" name="option" id="exampleRadios1" value="postal service" checked>
    <label class="form-check-label" for="exampleRadios1">
        Postal service - 10 euro
    </label>
    <br>-Deliverytime is 5-10 days
    </div>
<br>
    <div class="form-check">
    <input class="form-check-input" type="radio" name="option" id="exampleRadios2" value="priority postal service">
    <label class="form-check-label" for="exampleRadios2">
        Priority postal service - 30 euro
    </label>
    <br>-Deliverytime 1-2 days
    </div>
<br>
    <div class="form-check">
    <input class="form-check-input" type="radio" name="option" id="exampleRadios3" value="pickup">
    <label class="form-check-label" for="exampleRadios3">
        Pickup at our store
    </label>
    <br>-Pick up at our adress
    </div>

    <p><br></p>
    <button type="submit" class="btn btn-primary">Choose payment method</button>

</form>