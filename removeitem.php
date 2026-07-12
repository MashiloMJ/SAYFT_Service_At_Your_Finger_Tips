
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
      $id=$_SESSION['user_id'];
      $email=$_SESSION['email'];
      
      $serviceId=$_GET['edt'];
  }




    $sql1="DELETE From booking WHERE booking_id='$serviceId'";

    $result1=mysqli_query($conn,$sql1);

  


    if (!$result1) {
    	echo "db access denied ".mysqli_error();
    }else{
      echo '<script>alert("Service succesfully removed from cart.");window.location = "bookings.php";</script>';
  }
  

?>
