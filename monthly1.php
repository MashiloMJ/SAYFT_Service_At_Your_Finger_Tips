<?php


$connect=mysqli_connect("localhost","root","","sayft");

//$id=$_GET['edt'];

//session_start();


 if(!isset($_SESSION)) 
    { 
        session_start(); 
        $email=$_SESSION['email'];
    }
   
    $qry2=mysqli_query($connect,"select * from user WHERE email='$email'and account_type='Service Provider'");
    $data2=mysqli_fetch_array($qry2);
    
    $id=$data2['user_id'];



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SAYFT</title><link rel="icon" href="assets/logo1.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abel">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Adamina">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Advent+Pro">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aguafina+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Akronim">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aladin">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alef">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+SC">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aleo">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alex+Brush">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alice">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alike">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allura">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Almendra">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Almendra+Display">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amaranth">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amethysta">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiko">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiri">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amita">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anaheim">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Andada">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Andika">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Angkor">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Annie+Use+Your+Telescope">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anonymous+Pro">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Antic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Antic+Didone">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Antic+Slab">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arapey">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arbutus">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arbutus+Slab">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Architects+Daughter">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Black">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Narrow">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aref+Ruqaa">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arima+Madurai">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arimo">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arizonia">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Armata">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arsenal">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Artifika">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arya">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Asap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Asar">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Asset">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Assistant">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Astloch">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Asul">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Athiti">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Atomic+Age">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aubrey">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Autour+One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Average">
    <link rel="stylesheet" href="assets/css/dh-highlight-left-right.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Login-Form.css">
    <link rel="stylesheet" href="assets/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Swipe-Slider-9.css">
</head>

<body style="font-family: 'Advent Pro', sans-serif;">
    <div>
        <nav class="navbar navbar-light navbar-expand-md shadow navigation-clean" style="background-color: rgb(237,14,0);color: rgb(255,255,255);opacity: 0.80;padding-top: 16px;">
            <div class="container"><a class="navbar-brand" href="" style="font-family: Asap, sans-serif;font-weight: normal;">&nbsp;<i class="fa fa-dashboard"></i>&nbsp;</a><a class="navbar-brand" href="#" style="font-family: Asap, sans-serif;font-weight: normal;">Logged In as <i class="fa fa-user"></i>&nbsp;<?php echo($data2['surname']." ".$data2['name']) ?>&nbsp;</a>
                <button
                    data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1" style="font-size: 17px;font-family: 'Advent Pro', sans-serif;">
                        <ul class="nav navbar-nav ml-auto" style="color: rgb(255,255,255);"></ul>
                    </div>
                    <ul class="nav navbar-nav flex-grow-1 justify-content-between">
                    <form action="spsearchrepo.php" method="post" style="text-align:center;">
                    <select name="field" style="height:35px;font-family: Asap, sans-serif;" required>
        <option style="font-family: Asap, sans-serif;" value="">Select Field</option>
        <option style="font-family: Asap, sans-serif;" value="(booking.booking_id)">booking id</option>
        <option style="font-family: Asap, sans-serif;" value="(user.name)">name</option>
        <option style="font-family: Asap, sans-serif;" value="(user.surname)">surname </option>
        <option style="font-family: Asap, sans-serif;" value="(user.email)">email </option>
        <option style="font-family: Asap, sans-serif;" value="(user.id_number)">id number </option>
        <option style="font-family: Asap, sans-serif;" value="(user.age)">Age</option>
        <option style="font-family: Asap, sans-serif;" value="(user.gender)">gender</option>
        <option style="font-family: Asap, sans-serif;" value="(location.stand_no)">stand no</option>
        <option style="font-family: Asap, sans-serif;" value="(location.street_name)">Street Name </option>
        <option style="font-family: Asap, sans-serif;" value="(location.suburb)">Suburb </option>
        <option style="font-family: Asap, sans-serif;" value="(location.city)">City </option>
        <option style="font-family: Asap, sans-serif;" value="(location.province)">Province </option>
        <option style="font-family: Asap, sans-serif;" value="(service.service_type)">Service Type</option>
        <option style="font-family: Asap, sans-serif;" value="(date_Format(booking.booking_date,'%d-%M-%Y'))">Booking date</option>
        <option style="font-family: Asap, sans-serif;" value="(service.description)">Description </option>
        <option style="font-family: Asap, sans-serif;" value="(payment.payment_type)">Payment Type </option>
        <option style="font-family: Asap, sans-serif;" value="(booking_details.qty)">Quantity </option>
   
        
       
    </select>&nbsp;
    <input  placeholder="Search Here" style="font-family: Asap, sans-serif;height:35px;" name="search" required ></input>&nbsp;
    <input  class="btn btn-sm" style="font-family: Asap, sans-serif;background-color:rgb(255,255,255) ;color: rgb(240,62,51);" type="submit" placeholder="Search Here" value="search" style="height:35px;"></input>&nbsp;
    
    <select   onchange="location=this.value;" style="height:35px;font-family: Asap, sans-serif;">
        <option  style="font-family: Asap, sans-serif;">--Reports--</option>
        <option  style="font-family: Asap, sans-serif;" value="daily1.php">Daily Report</option>
        <option  style="font-family: Asap, sans-serif;" value="weekly1.php">Weekly Report</option>
        <option  style="font-family: Asap, sans-serif;" value="">Monthly Report</option>
    </select>

</form>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="sprofileDash.php" style="color: rgb(255,255,255);font-family: Asap, sans-serif;"><i class="fa fa-sign-out" style="font-size: 23px;"></i></a></li>
                    </ul>
            </div>
        </nav>
    </div>
    <div class="col" style="font-family: Asap, sans-serif;padding-top: 21px;">
        <h1 class="text-center" style="color: rgb(240,62,51);font-size: 26px;">Monthly reports</h1>
    </div>
    
    <hr style="background-color: #f03e33;">
    <?PHP
              
                

               

                  

              $query="SELECT
              booking.booking_id AS bid,
              USER.user_id AS aid,
              USER.name AS name,
              USER.age AS ag,
              USER.surname AS surname,
              USER.email AS email,
              USER.id_number AS idn,
              USER.phone_number AS numbers,
              USER.gender AS gen,
              location.stand_no AS sno,
              location.street_name AS sname,
              location.suburb AS sub,
              location.city AS city,
              location.province AS prov,
              service.service_type AS serv,
              booking.booking_date AS bdate,
              service.description AS descr,
              payment.payment_type AS paytype,
              service.image AS image,
              booking_details.qty as qty,
              booking_details.price as price
            
          FROM
              USER,
              booking,
              service,
              payment,
              location,
              booking_details
          WHERE
              booking.booking_id = payment.booking_id 
          AND booking.user_id = USER.user_id
          AND payment.user_id = USER.user_id 
          AND USER.user_id = location.user_id
          AND booking_details.booking_id=booking.booking_id
          AND booking_details.user_id=user.user_id
          AND booking_details.service_id=service.service_id
              AND MONTH(booking.booking_date)=MONTH(sysdate())
              AND service.user_id='$id'
              
              ";
              $result=mysqli_query($connect,$query);
              
            

              $rows=mysqli_num_rows($result);
         
              
             
              
              if ($rows>0) {
                


              
                ?>
    <div class="col" style="font-family: Asap, sans-serif;">
        <div class="table-responsive table-borderless" >
            <table class="table table-bordered table-sm">
                <thead style="background-color: #f03e33;color: rgb(255,255,255);font-weight: normal;font-style: normal;">
                    <tr>
                    <th style="font-weight: normal;">Booking #</th>
                        <th style="font-weight: normal;">Client Surname & Name</th>
                       
                        <th style="font-weight: normal;">Id Number</th>
                        <th style="font-weight: normal;">Age</th>
                        <th style="font-weight: normal;">Gender</th>
                        <th style="font-weight: normal;">Email</th>
                        <th style="font-weight: normal;">Phone Number</th>
                       
                        <th style="font-weight: normal;">Stand No.</th>
                        <th style="font-weight: normal;">Street Name</th>
                        <th style="font-weight: normal;">Suburb</th>
                        <th style="font-weight: normal;">City</th>
                        <th style="font-weight: normal;">Province</th>
                        <th style="font-weight: normal;">Service Type</th>
                        <th style="font-weight: normal;">Service Image</th>
                        <th style="font-weight: normal;">Description</th>
                        <th style="font-weight: normal;">Quantity</th>
                        <th style="font-weight: normal;">Payment Type</th>
                        <th style="font-weight: normal;">Price</th>
                        <th style="font-weight: normal;">Date of booking</th>
                       
                        
                    </tr>
                </thead>
                <?php
                    while ($rows=mysqli_fetch_array($result)) {
                  ?>
                <tbody>
                    <tr>
                    <td style="font-family: Asap, sans-serif;"><?php echo $rows['bid'];?></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['surname'].' '.$rows['name'];?></td>
                                           
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['idn'];?></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['ag'];?></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['gen'];?></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['email'];?></td>
                                           
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['numbers'];?></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['sno'];?></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['sname'];?></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['sub'];?></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['city'];?></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['prov'];?></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['serv'];?></td>
                                            <td style="font-family: Asap, sans-serif;"><img src="images/<?php echo $rows['image'];?>" style="width: 150px;height:100px;"></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['descr'];?></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['qty'];?></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['paytype'];?></td>
                                            <td style="font-family: Asap, sans-serif;">R<?php echo number_format($rows['price'],2);?></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['bdate'];?></td>
                   
                    </tr>
                </tbody>
                <?php
                  
                }
                ?>
            </table>
            <?php
              }else{
                ?>
               <h3 style="color: rgb(240,62,51);font-size: 26px;text-align:center;">No record(s)</h3>
                <?php
              }
              
            
              ?>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/login-full-page-bs4.js"></script>
    <script src="assets/js/login-full-page-bs4-1.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Swipe-Slider-9.js"></script>
</body>
<p style="text-align:center;">
           

            <button class="btn btn-sm" style="font-family: Asap, sans-serif;background-color: rgb(240,62,51);color: rgb(255,255,255);" onclick="$('table').table2csv();">Export as csv</button>
            <button class="btn btn-sm" style="font-family: Asap, sans-serif;background-color: rgb(240,62,51);color: rgb(255,255,255);" onclick="$('table').wordExport({font:20});">Export as Document</button>
            <button class="btn btn-sm" style="font-family: Asap, sans-serif;background-color: rgb(240,62,51);color: rgb(255,255,255);" onclick="$('table').tblToExcel();">Export as xls</button>
            <button class="btn btn-sm" style="font-family: Asap, sans-serif;background-color: rgb(240,62,51);color: rgb(255,255,255);" onclick="$('table').tblToExcel();">Export as pdf</button>
     
            </p>                         
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="table2csv.js"></script>
<script src="jspdf.js"></script>
<script src="jspdf/libs/base64.js"></script>
<script src="jspdf/libs/sprintf.js"></script>
<script src="jquery.base64.js"></script>
<script src="tableExport.js"></script>
<script src="jquery.tableToExcel.js"></script>
<script src="FileSaver.js"></script> 
<script src="jquery.wordexport.js"></script>
</html>
<script>
function myfunction()
{
window.print();  
}
</script>