<?php



if(isset($_POST['email']) && isset($_POST['cellno']) &&isset($_POST['password'])){
 //Assign
 $cellno=$_POST['cellno'];
$email=$_POST['email'];
$password=md5($_POST['password']);
//check record
$connect=mysqli_connect("localhost","root","","sayft");

$query="select * from user where email='$email'and phone_number='$cellno'";

$result=mysqli_query($connect,$query) or die(mysqli_error($connect));


$row=mysqli_fetch_array($result);


if($row['email']==$email && $row['phone_number']==$cellno)
{
     

    $command="UPDATE  user SET password='$password'
    WHERE user.email='$email'";
    
    
    $edit=mysqli_query($connect,$command);    
    
    if($edit){
    mysqli_close($connect);
    
    echo '<script>alert("Information password Updated.");window.location = "login.php";</script>';
    
    exit;
    
    }
    else
    {
        echo mysqli_error();
    
    }
  
   
    
   

}else
{

    echo'<script>alert("Make sure both email and cell number is correct.")</script>';
     
    //header("Location:account.php");  
    require 'changepassword.php'; 
  
}

}

?>