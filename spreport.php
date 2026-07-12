<?php


$connect=mysqli_connect("localhost","root","","sayft");

//$id=$_GET['edt'];

//session_start();


 if(!isset($_SESSION)) 
    { 
        session_start(); 
        $email=$_SESSION['email'];
        $_SESSION['$id']=$_GET['edt'];
        $id= $_SESSION['$id'];
    }
   





$qry2=mysqli_query($connect,"select * from user WHERE email='$email' and account_type='Service Provider'");
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
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/MUSA_no-more-tables-1.css">
    <link rel="stylesheet" href="assets/css/MUSA_no-more-tables.css">
    <link rel="stylesheet" href="assets/css/styles.css">


 
    
</head>

<body style="font-family: 'Advent Pro', sans-serif;">
    <div>
        <nav class="navbar navbar-light navbar-expand-md shadow navigation-clean" style="background-color: rgb(237,14,0);color: rgb(255,255,255);opacity: 0.80;padding-top: 16px;">
            <div class="container"> <ul class="nav navbar-nav flex-grow-1 justify-content-between">

                        <li class="nav-item" role="presentation"><a class="nav-link" href="sprofileDash.php" style="color: rgb(255,255,255);font-family: Asap, sans-serif;"><i class="fa fa-sign-out" style="font-size: 23px;"></i></a></li>
                    </ul><a class="navbar-brand" href="" style="font-family: Asap, sans-serif;font-weight: normal;color:rgb(255,255,255);">&nbsp;<i class="fa fa-dashboard"></i>&nbsp;</a><a class="navbar-brand" href="#" style="font-family: Asap, sans-serif;font-weight: normal;color:rgb(255,255,255);">Logged In as <i class="fa fa-user"></i>&nbsp;<?php echo($data2['surname']." ".$data2['name']) ?>&nbsp;</a>
                <button
                    data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1" style="font-size: 17px;font-family: 'Advent Pro', sans-serif;">
                        <ul class="nav navbar-nav ml-auto" style="color: rgb(255,255,255);"></ul>
                    </div>
                   
            </div>
        </nav>
    </div>
    <div class="col" style="font-family: Asap, sans-serif;padding-top: 21px;">
        <h1 class="text-center" style="color: rgb(240,62,51);font-size: 26px;">Generate reports here!</h1>
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
          AND booking_details.service_id=service.service_id
              AND service.user_id='$id'";
              $result=mysqli_query($connect,$query);
              
            

              $rows=mysqli_num_rows($result);
         
              
             
              
              if ($rows>0) {
                


              
                ?>
    <div class="col" >
    <div class="card-header py-2">
    <section class="mt-4"></section>                    
        <div  class="table-responsive table mb-0 pt-3 pr-2" >
        <table id="page-content" class="table table-striped table-sm my-0 mydatatable" style="font-size: 12px;"><button type="button" class="dt-button" href="javascript:void(0)" aria-controls="page-content" type="button"><span>Word</span></button>  
                <thead style="background-color: #f03e33;color: rgb(255,255,255);font-weight: normal;font-style: normal;"style="font-family: 'Advent Pro', sans-serif;">
                    <tr>
                    <th >Booking #</th>
                        <th >Client </th>
                       
                        <th >Id Number</th>
                        <th >Age</th>
                        <th >Gender</th>
                        <th >Email</th>
                        <th >Phone Number</th>
                       
                        <th >Stand No.</th>
                        <th >Street Name</th>
                        <th >Suburb</th>
                        <th >City</th>
                        <th >Province</th>
                        <th >Service Type</th>
                        <th >Service Image</th>
                        <th >Description</th>
                   
                        <th >Quantity</th>
                        <th >Price</th>
                        <th >Date of booking</th>
                       
                        
                    </tr>
                </thead>
            
                <tbody>  
                     <?php
                    while ($rows=mysqli_fetch_array($result)) {
                  ?>
                    <tr>
                                            <td><?php echo $rows['bid'];?></td>
                                            <td ><?php echo $rows['surname'].' '.$rows['name'];?></td>
                                           
                                            <td ><?php echo $rows['idn'];?></td>
                                            <td ><?php echo $rows['ag'];?></td>
                                            <td ><?php echo $rows['gen'];?></td>
                                            <td ><?php echo $rows['email'];?></td>
                                           
                                            <td ><?php echo $rows['numbers'];?></td>
                                            <td ><?php echo $rows['sno'];?></td>
                                            <td ><?php echo $rows['sname'];?></td>
                                            <td ><?php echo $rows['sub'];?></td>
                                            <td ><?php echo $rows['city'];?></td>
                                            <td ><?php echo $rows['prov'];?></td>
                                            <td ><?php echo $rows['serv'];?></td>
                                            <td ><img src="images/<?php echo $rows['image'];?>" style="width: 50px;height:25px;"></td>
                                            <td ><?php echo $rows['descr'];?></td>
                                        
                                            <td ><?php echo $rows['qty'];?></td>
                                            <td>R <?php echo number_format($rows['price'],2);?></td>
                                            <td ><?php echo $rows['bdate'];?></td>
                   
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
    </section>

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


    