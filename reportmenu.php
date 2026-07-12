<?php


$connect=mysqli_connect("localhost","root","","sayft");

//$id=$_GET['edt'];

//session_start();


 if(!isset($_SESSION)) 
    { 
        session_start(); 
        $email=$_SESSION['email'];
    }
   
$qry2=mysqli_query($connect,"select * from user WHERE email='$email'and account_type='Admin'");
$data2=mysqli_fetch_array($qry2);



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



    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/MUSA_no-more-tables-1.css">
    <link rel="stylesheet" href="assets/css/MUSA_no-more-tables.css">
    <link rel="stylesheet" href="assets/css/styles.css">


 
</head>

<body style="font-family: 'Advent Pro', sans-serif;">
    <div>
        <nav class="navbar navbar-light navbar-expand-md shadow navigation-clean" style="background-color: rgb(237,14,0);color: rgb(255,255,255);opacity: 0.80;padding-top: 16px;">
            <div class="container"><a class="navbar-brand" href="index.html" style="font-family: Asap, sans-serif;font-weight: normal;">&nbsp;<i class="fa fa-dashboard"></i>&nbsp;</a><a class="navbar-brand" href="#" style="font-family: Asap, sans-serif;font-weight: normal;">Logged In as <i class="fa fa-user"></i>&nbsp;<?php echo($data2['surname']." ".$data2['name']) ?>&nbsp;</a>
                <button
                    data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1" style="font-size: 17px;font-family: 'Advent Pro', sans-serif;">
                        <ul class="nav navbar-nav ml-auto" style="color: rgb(255,255,255);"></ul>
                    </div>
                    <ul class="nav navbar-nav flex-grow-1 justify-content-between">
                    <form action="searching.php" method="post" style="text-align:center;">
                    <select name="field" style="height:35px;font-family: Asap, sans-serif;" required>
        <option style="font-family: Asap, sans-serif;" value="">Select Field</option>

        <option style="font-family: Asap, sans-serif;" value="(location.province)">Province </option>
        <option style="font-family: Asap, sans-serif;" value="(service.service_type)">Service Type</option>

   
        
       
    </select>&nbsp;
    <input  placeholder="Search Here" style="font-family: Asap, sans-serif;height:35px;" name="search" required ></input>&nbsp;
    <input  class="btn btn-sm" style="font-family: Asap, sans-serif;background-color:rgb(255,255,255) ;color: rgb(240,62,51);" type="submit" placeholder="Search Here" value="search" style="height:35px;"></input>&nbsp;
    
    <select   onchange="location=this.value;" style="height:35px;font-family: Asap, sans-serif;">
        <option  style="font-family: Asap, sans-serif;">--Reports--</option>
        <option  style="font-family: Asap, sans-serif;" value="daily.php">Daily Report</option>
        <option  style="font-family: Asap, sans-serif;" value="weekly.php">Weekly Report</option>
        <option  style="font-family: Asap, sans-serif;" value="monthly.php">Monthly Report</option>
    </select>

</form>


                        <li class="nav-item" role="presentation"><a class="nav-link" href="adminDash.php" style="color: rgb(255,255,255);font-family: Asap, sans-serif;"><i class="fa fa-sign-out" style="font-size: 23px;"></i></a></li>
                    </ul>
            </div>
        </nav>
    </div>
    <div class="col" style="font-family: Asap, sans-serif;padding-top: 21px;">
        <h1 class="text-center" style="color: rgb(240,62,51);font-size: 26px;">Generate reports here!</h1>
    </div>
    <hr style="background-color: #f03e33;">
    <div>

    <form action="datebetween.php" method="post" style="text-align:center;">
                    
    <input type="text" placeholder="Begin date" onfocus="(this.type='date')" style="font-family: Asap, sans-serif;height:35px;" name="1date" required >&nbsp;
    <input type="text"  placeholder="Last date" onfocus="(this.type='date')" style="font-family: Asap, sans-serif;height:35px;" name="2date" required >&nbsp;
   
    <input  class="btn btn-sm" style="font-family: Asap, sans-serif;background-color:rgb(240,62,51) ;color:rgb(255,255,255);" type="submit" placeholder="Search Here" value="Retrieve data" style="height:35px;"></input>&nbsp;
   
    
</form>

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
              DATE_FORMAT(booking.booking_date,' %d-%m-%Y') AS bdate,
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
          AND booking_details.service_id=service.service_id";
              $result=mysqli_query($connect,$query);
              
            

              $rows=mysqli_num_rows($result);
         
              
             
              
              if ($rows>0) {
                


              
                ?>
    <div class="col" style="font-family: Asap, sans-serif;">
        <div class="table-responsive table mb-0 pt-3 pr-2" ><button type="button" class="dt-button" href="javascript:void(0)" aria-controls="page-content" type="button"><span>Word</span></button> 
            <table id="page-content" class="table table-striped table-sm my-0 mydatatable" style="font-size: 12px;" >
                <thead style="background-color: #f03e33;color: rgb(255,255,255);font-weight: normal;font-style: normal;">
                    <tr>
                    <th style="font-weight: normal;">Booking #</th>
                        <th style="font-weight: normal;">Client</th>
                       
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
                        <th style="font-weight: normal;">price</th>
                        <th style="font-weight: normal;">Date of booking</th>
                       
                        
                    </tr>
                </thead>
              
                <tbody>
                    <?php
                    while ($rows=mysqli_fetch_array($result)) {
                  ?>
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
                                            <td style="font-family: Asap, sans-serif;"><img src="images/<?php echo $rows['image'];?>"  style="width: 50px;height:25px;"></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['descr'];?></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['qty'];?></td>
                                            <td style="font-family: Asap, sans-serif;">R<?php echo number_format($rows['price'],2);?></td>
                                            <td style="font-family: Asap, sans-serif;"><?php echo $rows['bdate'];?></td>
                   
                    </tr>

                     <?php
                  
                }
                ?>
                </tbody>
               
            </table>
            <?php
              }else{
                ?>
               <h3 style="color: rgb(240,62,51);font-size: 26px;text-align:center;">No record(s)</h3>
                <?php
              }
              
            
              ?>
        </div>                  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="FileSaver.js"></script> 
<script src="jquery.wordexport.js"></script> 
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("button.dt-button").click(function(event) {
            $("#page-content").wordExport();
        });
    });
    </script>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="assets/js/DataTable---Fully-BSS-Editable.js"></script>
</body>
                       
        </div>
    </div>

</html>
