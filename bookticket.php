<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/btngp.css">
    <link rel="stylesheet" href="css/bookticket.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/activities.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/navbar.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AU6Y-JLJTiIu5WMiclvuXMPlJkQHhNdwolssjBeBoXVCwh6AIjVI7RtkrDYsp-heA6ShEzSRzY45eh5Z"></script>


</head>

<body>

<div class="header">
    <img class="logo" src="ccs_logo.png" alt="Ccs Logo" usemap="#workmap"href="homepage.html">
    <map name="workmap">
        <area shape="default"alt="Whole Logo" href="homepage.html">
    </map>

    <h1>Big Rosella Festival</h1>

</div>
<div class="topnav" id="myTopnav">
    <a href="homepage.html" >Home</a>
    <a href="activities.html">Activities</a>
    <a href="about.html">About</a>
    <a href="contact.html">Contact</a>
    <a href="bookticket.php" class="active">Book Ticket</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>


</div>

<h2>Book Ticket</h2>

<form id="payment-form" action="action.php" method="post" >
    <div class="row">
        <div class="column">
            <h2>Customer detail</h2>
            <label for="FirstName">First Name</label>
            <input type="text" id="FirstName" name="FirstName" placeholder="Your name.."><br>
            <label for="LastName">Last Name</label>
            <input type="text" id="LastName" name="LastName" placeholder="Your last name.."><br>
            <label for="Age">Age</label>
            <select id="Age" name="Age">
                <option value="0">Select</option>
                <option value="-18">-18</option>
                <option value="18-29">18-29</option>
                <option value="30-39">30-39</option>
                <option value="40-49">40-49</option>
                <option value="+50">+50</option>
            </select><br>
            <label for="Email">Email Address</label>
            <input type="email" id="Email" name="Email" size="99" class="form-control mb-3 StripeElement StripeElement--empty" required placeholder="Email Address"><br>
            <label for="Contact_Num">Contact number</label>
            <input type="text" id="Contact_Num" name="Contact_Num" placeholder="Your Contact number."><br>
            <fieldset>
                <legend>How did you hear about The Big Rosella Festival?</legend>
                <input type="checkbox" name="Comments" value="Email">Email<br>
                <input type="checkbox" name="Comments" value="SocialMedia">Social Media<br>
                <input type="checkbox" name="Comments" value="Friends">Friends<br>
                <input type="checkbox" name="Comments" value="Newspaper">Newspaper<br>
                <input type="checkbox" name="Comments" value="Website">Website<br>
                <input type="checkbox" name="Comments" value="Other">Other<br>
                <label for="Other">If your select Other, </label>
                <textarea id="Other" name="Other" placeholder="Write something.." style="height:170px"></textarea>
            </fieldset>
            <input type="reset"><br>
        </div>

        <div class="column">
            <h2>Payment</h2>
            <fieldset>
                <legend > Festival Ticket [$5/P] </legend><br>
                <div class="form-row">
                    <label for="CardName">Name</label>
                    <input type="text" id="CardName" name="CardName" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Name on Card"><br>
                    <label for="Quantity">Ticket Quantity</label>
                    <select id="Quantity" name="Quantity" onchange="updateTotal()"><br>

                        <option value="0">Quantity</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select><br>
                    <label for="TotalPrice">Total Payment Price / AUD </label>
                    <input type="text" name="TotalPrice" id="TotalPrice"/> <br/>

                    <input type="reset"><br>
                </div><br>
            </fieldset><br>
            <fieldset>
                <legend > Credit/Debit Card Details </legend ><br>
                        <div id="card-element" class="form-control">
                        <!-- a Stripe Element will be inserted here. -->
                        </div>
                        <!-- Used to display form errors -->
                        <div id="card-errors" role="alert"></div><br>
                        <button type="submit" >Pay by Credit card</button><br>

            </fieldset><br>
            <div id="paypal-button-container"></div>
        </div>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="./js/charge.js"></script>
<script>
    function updateTotal() {
        var quantity = document.getElementById("Quantity").value;
        var total = 5 * quantity;
        document.getElementById("TotalPrice").value = total;
    }
</script>
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD&disable-funding=credit,card" data-sdk-integration-source="button-factory"></script>
<script>
    paypal.Buttons({
        style: {
            shape: 'rect',
            color: 'gold',
            layout: 'vertical',
            label: 'paypal',

        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: document.getElementById("TotalPrice").value
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name + '!');
            });
        }
    }).render('#paypal-button-container');
</script>
</body>
<div class="footer">
    <style>
        h2 {
            display: block;
            font-size: 1.7em;
            margin-block-start: 0.20em;
            margin-block-end: 0.20em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }


    </style>
    <br><h2>Big Rosella Festival</h2></br>
    <div>
        <div class="column">
            <p>
                Follow our social media!
            </p>
            <p>
                <br><a href="https://www.facebook.com/ccskitchen/">Facebook</a></br>
                <br><a href="https://www.instagram.com/ccs.kitchen/">Instagram</a></br>
                <br><a href="https://www.facebook.com/petersensfarm/">Petersen's Farm</a></br>
            </p>
        </div>
        <div class="column">
            <p>
                Our Website
            </p>
            <br><a href="homepage.html">Home</a></br>
            <br><a href="activities.html">Activities</a></br>
            <br><a href="about.html">About</a></br>
            <br><a href="contact.html">Contact</a></br>
            <br><a href="bookticket.php">Book Ticket</a></br>
        </div>
    </div>
</div>
</html>