<?php


$connect = mysqli_connect("localhost","root","","sayft");
    
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



  $qry="SELECT *from service where service_id='$serviceId'";
  $res=mysqli_query($connect,$qry);

  $data=mysqli_fetch_array($res);



  if($data['quantity'] < 1)
  {
  
      echo '<script>alert("no service(s) available please check other service providers.");window.location = "search.php";</script>';
      exit;
  
  
  }else{
  
  

  $command="
  INSERT INTO booking(user_id,service_id) 
              VALUES ('$id','$serviceId')";
  
  
  
  $edit=mysqli_query($connect,$command);  
  
  
  if($edit){
  mysqli_close($connect);
  


 
  echo '<script>alert(" Item was added to cart");window.location = "bookings.php";</script>';
  
  exit;
  
  }
  
}




?>
