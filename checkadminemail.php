<?php

if(isset($_POST['submit'])){
    //Assign
    //$accounttype=$_POST['accounttype'];
   $email=$_POST['email'];
  
   
   //check record
   $connect=mysqli_connect("localhost","root","","sayft");
   
   $query="select * from admin where email='$email' ";
   
   
   
   $result=mysqli_query($connect,$query) or die(mysqli_error($connect));
   
   
   $row=mysqli_fetch_array($result);
   
   
   if($row['email']==$email)
   {
   

         
      // echo'<script>alert("Email and accounttype exist.")</script>';
      session_start();
      $_SESSION['email']=$row['email'];
      $email=$_SESSION['email'];

     
      $_SESSION['phone_number']=$row['phone_number'];
      $mobileno=$_SESSION['phone_number'];
       include 'changeadminpassword.php'; 
       
      
   
   }else
   {

    echo'<script>alert("Email does not exist.")</script>';    
    include 'login-admin.php'; 
   }
   
   }

?>