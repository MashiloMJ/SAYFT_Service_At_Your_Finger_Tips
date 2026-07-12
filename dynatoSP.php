<?php

$connect=mysqli_connect("localhost","root","","sayft");

$id=$_GET['edt'];



$command="UPDATE  user
 SET 
 account_type='Service Provider'
 WHERE email='$id'";


$edit=mysqli_query($connect,$command);
  

if($edit){
mysqli_close($connect);

echo '<script>alert("Welcome to service provider account.");window.location = "sprofileDash.php";</script>';

exit;

}
else
{
    echo mysqli_error();

}







?>
