<?php
 
if(isset($_POST['email']) && isset($_POST['password'])){
 //Assign
 $accounttype=$_POST['accounttype'];
$email=$_POST['email'];
$password=md5($_POST['password']);
 session_start();

//check record
$connect=mysqli_connect("localhost","root","","sayft");

$query="select * from user where email='$email'and password='$password' and account_type='$accounttype'";



$result=mysqli_query($connect,$query) or die(mysqli_error($connect));


$row=mysqli_fetch_array($result);


if($accounttype=='Client')
{
    if(strtolower($row['email'])==strtolower($email) && $row['password']==$password &&$row['account_type']=='Client')
    {
 $_SESSION['email']=$row['email'];
    $email=$_SESSION['email'];
    $_SESSION['user_id']=$row['user_id'];
    $id=$_SESSION['user_id'];
    echo'<script>alert("Login was successful")</script>'; 
    require 'profileDash.php';


    }else
    {

        echo'<script>alert("Invalid login credentials.")</script>';    
        require 'login.php'; 

    }

   
   

}elseif($accounttype=='Service Provider')
{
    if(strtolower($row['email'])==strtolower($email) && $row['password']==$password &&$row['account_type']=='Service Provider')
    {


    $_SESSION['email']=$row['email'];
    $email=$_SESSION['email'];
    $_SESSION['user_id']=$row['user_id'];
    $id=$_SESSION['user_id'];

    echo'<script>alert("Login was successful")</script>'; 
    require 'sprofileDash.php';

    }else
    {

        echo'<script>alert("Invalid login credentials.")</script>';    
        require 'login.php'; 


    }
   
 
}elseif($accounttype=='Admin')
{

    if(strtolower($row['email'])==strtolower($email) && $row['password']==$password &&$row['account_type']=='Admin')
    {

  $_SESSION['email']=$row['email'];
    $email=$_SESSION['email'];
    $_SESSION['user_id']=$row['user_id'];
    $id=$_SESSION['user_id'];

    echo'<script>alert("Login was successful")</script>'; 
    require 'adminDash.php';

    }else
    {

        echo'<script>alert("You are not registered as Admin.")</script>';    
        require 'login.php'; 

    }
  
}

}

?>

