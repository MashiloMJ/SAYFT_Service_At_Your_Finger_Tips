<?php



$connect = mysqli_connect("localhost","root","","sayft");
use PHPMailer\PHPMailer\PHPMailer;   
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 
  if(!isset($_SESSION)) 
  { 
      session_start(); 
      $id=$_SESSION['user_id'];
      $email=$_SESSION['email'];
      $bookingid=$_SESSION['bid'];
      
    
  }





  $query="SELECT * FROM payment
  WHERE payment.user_id ='$id'
  AND payment.booking_id='$bookingid'";

$qry=mysqli_query($connect,$query);
$data=mysqli_fetch_array($qry);


if($data['totAmount']>0)
{
 
    echo '<script>alert("You may pay your outstanding balance.");window.location = "paymentU.php";</script>';

}
else
{

  echo '<script>alert("You may make a payment.");window.location = "payment.php";</script>';


}





?>