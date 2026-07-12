<?php
$conn = mysqli_connect("localhost","root","","sayft");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$id=$_GET['edt'];


$query="SELECT * from payment where booking_id='$id'";
$result2=mysqli_query($conn,$query) or die(mysqli_error($conn));
$row=mysqli_fetch_array($result2);

$fee=$row['balAmount'];
$calc=($fee*(20/100));


    $sql1=" UPDATE payment 
    SET balAmount='$calc',totAmount='$calc'
    WHERE booking_id='$id'";
    $result1=mysqli_query($conn,$sql1);


    $sql=" UPDATE booking 
    SET status='1' 
    WHERE booking_id='$id'";
    $result=mysqli_query($conn,$sql);


    if (!$result && !$result1) {
    	echo "db access denied ".mysqli_error();
    }else{
      echo '<script>alert("booking succesfully cancelled,and 20% is taken from the amount you paid.");window.location = "invoice.php";</script>';
  }
  

?>


