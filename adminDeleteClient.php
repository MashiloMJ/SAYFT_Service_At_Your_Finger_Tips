<?php
$conn = mysqli_connect("localhost","root","","sayft");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  session_start();

$id=$_GET['edt'];


    $sql1=" DELETE From user WHERE user_id='$id'";
    $result1=mysqli_query($conn,$sql1);
  
    $sql2=" DELETE From location WHERE user_id='$id'";
    $result2=mysqli_query($conn,$sql2);

    if (!$result1&&!$result2) {
    	echo "db access denied ".mysqli_error();
    }else{
      echo '<script>alert("Account succesfully deleted.");window.location = "clientdb.php";</script>';
  }
  

?>


