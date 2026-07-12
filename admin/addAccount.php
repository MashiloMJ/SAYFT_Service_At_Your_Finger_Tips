
<?php

include 'connect.php'; 


$name=$_POST['name'];
$surname=$_POST['surname'];
$year=$_POST['dob'];
$age=DateTime::createFromFormat("Y-m-d", $year);
$pyear=$age->format("Y");
$curr=date("Y");
$calcAge=$curr-$pyear;
$dob=$_POST['dob1'];
$idno=$_POST['idno'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$cellno=$_POST['cellno'];

$accounttype=$_POST['accounttype'];

$password=md5($_POST['password']);



$query="select * from user where email='$email'";

$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

$row=mysqli_fetch_array($result);

if($row['email']==$email)
{


 echo '<script type="text/javascript">alert("Email Account exist Please login"); window.location = "SAYFT/login.php";</script>';

}                         
else{

$sql="INSERT INTO user(name, surname,id_number, age,gender, email, phone_number, account_type,password) 
            VALUES ('$name','$surname','$dob$idno','$calcAge','$gender','$email','$cellno','$accounttype','$password')";



                    

            if(mysqli_query($conn,$sql))
            {
    
      echo '<script type="text/javascript">alert("You Succesfully Registered Please Login Your Account"); window.location = "SAYFT/index.php";</script>';
         
                                                         
          }
          else{
            
           die("<h3>unsuccessfully not registered </h3>".mysqli_error($conn));
         
         }
       }
   
   
?>