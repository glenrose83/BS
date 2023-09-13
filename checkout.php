<p><br></p>
<form action="../../includes/checkout.inc.php" method="POST">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="fullName">Your full name</label>
            <input type="text" name="fullName" class="form-control" id="fullName" placeholder="">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-10">
            <label for="streetName">Streetname</label>
            <input type="text" class="form-control" id="streetName" name="streetname" placeholder="">
        </div>
        <div class="form-group col-md-2">
            <label for="housenumber">Housenumber</label>
            <input type="text" class="form-control" id="housenumber" name="housenumber" placeholder="">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="etc">Floor, apartment, suite etc.</label>
            <input type="text" name="etc" class="form-control" id="etc" placeholder="">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="postcode">Postcode</label>
            <input type="text" class="form-control" id="postcode" name="postcode" placeholder="">
        </div>
        <div class="form-group col-md-8">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 ">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="">
        </div>
        <div class="form-group col-md-6 ">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="country" name="country" placeholder="">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 ">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="">
        </div>
        <div class="form-group col-md-6 ">
            <label for="con_email">Confirm Email</label>
            <input type="email" class="form-control" id="con_email" name="email_confirm" placeholder="">
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Choose delivery method</button>
</form>