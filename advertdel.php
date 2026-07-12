<?php

session_start();

$conn=mysqli_connect("localhost","root","","sayft");

$id=$_GET['edt'];

   
     
    $sql2="DELETE FROM service WHERE service_id= '$id'";


    
    $result2=mysqli_query($conn,$sql2);



    if (!$result2) {
    	echo "db access denied ".mysqli_error();
    }else{
      echo '<script>alert("Advert deleted.");window.location = "MyAdvertView.php";</script>';
      exit;
  }
  

?>
