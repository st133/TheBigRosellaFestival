<?php
  require_once('vendor/autoload.php');

  \Stripe\Stripe::setApiKey('sk_test_qobKPVRxOqfnNwUmhRcpRmJf009ViR1fur');

 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);


 $Email = $POST['Email'];
 $CardName = $POST['CardName'];
 $token = $POST['stripeToken'];
 $ticket = $POST['TotalPrice'];

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "Email" => $Email,
  "source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => $TotalPrice,
  "currency" => "AUD",
  "description" => "The Big Rosella Festival Ticket",
  "customer" => $customer->id
));
