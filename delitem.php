<?php
$conn = mysqli_connect("localhost","root","","sayft");
use PHPMailer\PHPMailer\PHPMailer;
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  if(!isset($_SESSION)) 
  { 
      session_start(); 
      $bid=$_SESSION['bid'];
      
      $serviceId=$_GET['edt'];
  }
//fetch values from details
$query="select sum(price*qty) as total from booking_details where booking_id='$bid' and service_id='$serviceId'";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
$minusamount=$row['total'];
//fetch values from payment
$qry="select * from payment where booking_id='$bid'";
$data=mysqli_query($conn,$qry) or die(mysqli_error($conn));
$rows=mysqli_fetch_array($data);
$amount=$rows['totAmount'];
$paid=$rows['balAmount'];
//update

$portion=(($minusamount/$amount)* $paid);
$a=$paid-$portion;

$command="UPDATE payment
 SET totAmount=($amount-$minusamount),balAmount=($a)
WHERE booking_id='$bid'";
$edit=mysqli_query($conn,$command);
//delete item  
$sql1="DELETE From booking_details WHERE booking_id='$bid' and service_id='$serviceId'";
$result1=mysqli_query($conn,$sql1);

if($edit){

mysqli_close($conn);

echo '<script>window.location = "invoice.php";</script>';

}
else
{
    echo mysqli_error();

}
//


  
    

?>