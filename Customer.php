
<?php

 $Servername = "AmazonRDS";
 $username = "admin";
 $password = "ICT342project";
 $host = "database-1.cjawwleijwpi.ap-southeast-2.rds.amazonaws.com";
 $dbname = "CustomerDB";
 $table = "Customer"; //Enter the table name




 $connection= mysqli_connect($host,$username,$password,$dbname);
 if (!$connection)
 {
     die ('Could not connect:' .  mysqli_connect_error());
 }



 $FirstName= mysqli_real_escape_string($connection,$_REQUEST['FirstName']);
 $LastName= mysqli_real_escape_string($connection,$_REQUEST['LastName']);
 $Age= mysqli_real_escape_string($connection,$_REQUEST['Age']);
 $Email= mysqli_real_escape_string($connection,$_REQUEST['Email']);
 $Contact_Num= mysqli_real_escape_string($connection,$_REQUEST['Contact_Num']);
 $Comments=mysqli_real_escape_string($connection,$_REQUEST['Comments']);
 $Other= mysqli_real_escape_string($connection,$_REQUEST['Other']);
 $CardName= mysqli_real_escape_string($connection,$_REQUEST['CardName']);
 $Quantity= mysqli_real_escape_string($connection,$_REQUEST['Quantity']);
 $TotalPrice= mysqli_real_escape_string($connection,$_REQUEST['TotalPrice']);


 $sql= "INSERT INTO Customer (FirstName, LastName,Age,Email,Contact_Num,Comments,Other) VALUES ('$FirstName', '$LastName', '$Age','$Email', '$Contact_Num', '$Comments', '$Other')";
 $sql1="INSERT INTO Payment (CardName,Quantity,TotalPrice) VALUES ('$CardName','$Quantity','$TotalPrice')";



mysqli_multi_query($connection, $sql);
mysqli_multi_query($connection, $sql1);

// Close connection
mysqli_close($connection);
 // Redirect to success
header('Location: success.php?Q='.$Quantity.'&T='.$TotalPrice.'&N='.$FirstName);
