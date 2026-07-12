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
      
     
  }



  
$standno=$_POST['standno'];
$streetname=$_POST['streetname'];
$suburb=$_POST['suburb'];
$city=$_POST['city'];
$province=$_POST['province'];


  $qry="SELECT * from location where user_id='$id'";
  $res=mysqli_query($connect,$qry);

  $data=mysqli_fetch_array($res);


if($data['user_id']==$id)
{

  echo '<script>alert("address is already added.");window.location = "addressview.php";</script>';
  exit;



}else{
  
  

  $command="INSERT INTO location( user_id, province, city, suburb, street_name, stand_no) 
              VALUES ('$id','$province','$city','$suburb','$streetname','$standno')";
  
  
  
  $edit=mysqli_query($connect,$command);  
  
  
  if($edit){
  mysqli_close($connect);
  


 
  echo '<script>alert(" Address was successfully added.");window.location = "addressview.php";</script>';
  
  exit;
  
  }
  
}




?>
