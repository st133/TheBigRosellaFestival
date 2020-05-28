<?php
if(!empty($_GET['Q'] && !empty($_GET['T'] && !empty($_GET['N'])))) {
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
    $N = $GET['N'];
    $Q = $GET['Q'];
    $T = $GET['T'];
} else {
    header('Location: Checkout.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Thank You</title>
</head>
<body>
  <div class="container mt-4">
    <h2>Thank you for purchasing </h2>
    <hr>
     <p> The booking/reservation is under  <?php echo $N;?></p>
    <p>Ticket Quantity is  <?php echo $Q;?></p>
    <p>Your Total amount is $ <?php echo $T;?></p>
    <p>Check your email for more info</p>
    <p><a href="homepage.html" class="btn btn-light mt-2">Go to Main page</a></p>
  </div>
</body>
</html>