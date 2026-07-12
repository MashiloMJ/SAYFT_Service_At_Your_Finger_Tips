<?php

$connect=mysqli_connect("localhost","root","","sayft");

$id=$_GET['edt'];



$command="UPDATE  user
 SET 
 account_type='Client'
 WHERE email='$id'";


$edit=mysqli_query($connect,$command);
  

if($edit){
mysqli_close($connect);

echo '<script>alert("Welcome to client account.");window.location = "profileDash.php";</script>';

exit;

}
else
{
    echo mysqli_error();

}







?>
