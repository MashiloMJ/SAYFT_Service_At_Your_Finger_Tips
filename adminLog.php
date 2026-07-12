<?php
 
if(isset($_POST['email']) && isset($_POST['password'])){
 //Assign
$email=$_POST['email'];
$password=md5($_POST['password']);
 session_start();

//check record
$connect=mysqli_connect("localhost","root","","sayft");

$query="select * from admin where email='$email'and password='$password'";

$result=mysqli_query($connect,$query) or die(mysqli_error($connect));

$row=mysqli_fetch_array($result);


if(strtolower($row['email'])==strtolower($email) && $row['password']==$password)
{

    $_SESSION['email']=$row['email'];
    $email=$_SESSION['email'];

    echo'<script>alert("Login was successful")</script>'; 
    require 'adminDash.php';

}else
{
 echo'<script>alert("You are not registered as admin.")</script>';    
 require 'login-admin.php'; 
}

}

?>

