                                                                                       <?php


$conn = mysqli_connect("localhost","root","","sayft");
use PHPMailer\PHPMailer\PHPMailer;
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

     //id=$_GET['edt'];

    $sql2="SELECT payment.totamount as tot,payment.totamount*0.2 as chargefee FROM
    payment
    WHERE payment.booking_id='$id'";

    $result2=mysqli_query($conn,$sql2);
     $data=mysqli_fetch_array($result2);

     $halfed=$data['chargefee'];


    

    
     
    


    $query3="SELECT user.user_id as ref,user.name as name,user.surname as surname,user.email as email,user.phone_number as numbers,service.image as photo,service.service_type as type,service.description as descp,service.price as price,booking.booking_date as bdate
    FROM user,service,booking
    WHERE
    user.user_id=booking.user_id
    AND service.service_id=booking.service_id
    AND user.user_id='$id'
    AND booking.booking_id='$serviceId'";
    
    
    
    $result3=mysqli_query($conn,$query3);
    $rows3=mysqli_fetch_array($result3); 
    
    
    
    $query4="SELECT user.user_id as ref,user.name as name,user.surname as surname,user.email as email,user.phone_number as numbers,service.image as photo,service.quantity as sid,service.service_type as type,service.description as descp,service.price as price,booking.booking_date as bdate,
    booking.payment_status as stats
    FROM user,service,booking
    WHERE
    user.user_id=service.user_id
    AND service.service_id=booking.service_id
    AND booking.booking_id='$serviceId'";
    
    
    
    $result4=mysqli_query($conn,$query4);
    $rows4=mysqli_fetch_array($result4);
    

    

    
$query="SELECT user.surname as surr,user.name as nam,service.service_type as serv
FROM user,service,booking
Where user.user_id=booking.user_id
And service.service_id=booking.service_id
AND user.email='$email'";



$result=mysqli_query($conn,$query);
$rows=mysqli_fetch_array($result);

    if (!$result) {
    	echo "db access denied ".mysqli_error();
    }else{

        if($rows4['stats']=='1')
        {


    $qry="UPDATE payment SET totamount='$halfed' Where booking_id='$serviceId'";
    $result=mysqli_query($conn,$qry);

            $names=$rows['surr'].' '.$rows['nam'];
            $serv=$rows['serv'];
            
            
                $mess="<table style='font-family: Asap, sans-serif;text-align:left;'>
                <tr><th style='font-size:50px;font-family: Asap, sans-serif;font-weight: Bold;background-color: #f03e33;color: rgb(255,255,255)'>SAYFT</th></tr>
                <tr><th style='font-size:20px;'>Notice!!!!</th></tr>
                <br><br>
                <tr><td style='font-size:18px;'>Dear &nbsp; &nbsp;$names</tr>
                <br><br>
                <tr><td style='font-size:18px;'>no reply message. &nbsp;&nbsp;</td></tr>
                <br>
                <tr><td style='font-size:18px;'>Your booking for $serv has been cancelled and 20% of cancellation fee was deducted from the initial amount you paid as a booking fee.</tr>
                <br>   <br>
                <tr><td style='font-size:18px;'>Regards</td></tr>
                <br>   <br>
                <tr><td style='font-size:18px;'>sayftsystem</td></tr>
                </table>";
                  
                        
                        $name =$names;
                        $email =$email;
                        $subject ='Notice.';
                        $body =$mess;
                        
                        require_once "PHPMailer/PHPMailer.php";
                        require_once "PHPMailer/SMTP.php";
                        require_once "PHPMailer/Exception.php";
                
                        $mail = new PHPMailer();
                
                        //SMTP Settings
                        $mail->isSMTP();
                        $mail->Host = "smtp.gmail.com";
                        $mail->SMTPAuth = true;
                        $mail->Username = "sayftsystem@gmail.com";
                        $mail->Password = 'Kabelo@15';
                        $mail->Port = 465; //587
                        $mail->SMTPSecure = "ssl"; //tls
                
                        //Email Settings
                        $mail->isHTML(true);
                        $mail->setFrom($email, $name);
                        $mail->addAddress($email);
                        $mail->Subject = $subject;
                        $mail->Body = $body;
                
                        if ($mail->send()) {
                            $status = "success";
                            $response = "Email is sent!";
                        } else {
                            $status = "failed";
                            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
                        }
                //sp
                $name=$rows4['surname'].' '.$rows4['name'];
                $type=$rows4['type'];
                $niome=$rows3['surname'].' '.$rows3['name'];
                $emails=$rows4['email'];
            
               
            
                $mess1="<table style='font-family: Asap, sans-serif;text-align:left;'>
                <tr><th style='font-size:50px;font-family: Asap, sans-serif;font-weight: Bold;background-color: #f03e33;color: rgb(255,255,255)'>SAYFT</th></tr>
                <tr><th style='font-size:20px;'>Notice!!!!</th></tr>
                <br>
                <tr><td style='font-size:18px;'>Dear &nbsp;$name</tr>
                <br>
                <tr><td style='font-size:18px;'>Cancellation of booking</td></tr>
                <br>
                <tr><td style='font-size:18px;'>$niome cancelled the booking for $type  and  20% of cancellation fee was deducted from the initial amount paid as half of booking fee.</tr>
                <br> 
                <tr><td style='font-size:18px;'>Regards</td></tr>
                <br>
                <tr><td style='font-size:18px;'>sayftsystem</td></tr>
                </table>";
            
            
                $name =$names;
                $email =$email;
                $subject ='Notice.';
                $body =$mess1;
                
                require_once "PHPMailer/PHPMailer.php";
                require_once "PHPMailer/SMTP.php";
                require_once "PHPMailer/Exception.php";
            
                $mail = new PHPMailer();
            
                //SMTP Settings
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "sayftsystem@gmail.com";
                $mail->Password = 'Kabelo@15';
                $mail->Port = 465; //587
                $mail->SMTPSecure = "ssl"; //tls
            
                //Email Settings
                $mail->isHTML(true);
                $mail->setFrom($email, $name);
                $mail->addAddress($emails);
                $mail->Subject = $subject;
                $mail->Body = $body;
            
                if ($mail->send()) {
                    $status = "success";
                    $response = "Email is sent!";
                } else {
                    $status = "failed";
                    $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
                }
                    echo '<script>confirm("20% of your paid total amount will be deducted,if you cancel the booking!.  ");window.location = "bookings.php";</script>';
            
            
                $sql1="DELETE From booking WHERE booking_id='$serviceId'";
            
                $result1=mysqli_query($conn,$sql1);
                 

               
              
                    exit;







        }else
        {


            echo '<script>confirm("Booking cancelled.  ");window.location = "bookings.php";</script>';
            $sql11="DELETE From booking WHERE booking_id='$serviceId'";
            $result11=mysqli_query($conn,$sql11);
            exit;


        }

  }










?>