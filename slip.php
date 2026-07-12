<!DOCTYPE html>
<html lang="en">
<?php
    $conn = mysqli_connect("localhost","root","","sayft");
    
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
      
      
      
    ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>bookings</title><link rel="icon" href="assets/logo1.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Cards-with-Hover-Effect-74-1.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Cards-with-Hover-Effect-74.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Cards-with-Hover-Effect-76-1.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Cards-with-Hover-Effect-76.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Cards-with-Hover-Effect-92-1.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Cards-with-Hover-Effect-92.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-4---Table-Fixed-Header.css">

    <link rel="stylesheet" href="assets/css/popbox.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Table-with-search-1-1.css">
    <link rel="stylesheet" href="assets/css/Table-with-search-1.css">
</head>
<?PHP
              
             
              
              // $type=$_POST['servicetype'];
               // $type='Drinks';              
              $booking=$_GET['edt'];
              $query="SELECT
              booking_details.qty AS quantity,
              service.service_type AS type,
              booking_details.price AS price,
              service.description AS disc,
              user.surname as surname,
              user.name as name
          FROM
              booking_details,
              booking,
              service,
              user
          WHERE
             user.user_id=service.user_id AND booking_details.booking_id = booking.booking_id AND service.service_id = booking_details.service_id AND booking_details.booking_id =(
              SELECT DISTINCT
                  (booking_details.booking_id)
              FROM
                  booking_details
              WHERE
                  booking_details.booking_id = '$booking'
          )";

              $result=mysqli_query($conn,$query);
              
              $rows=mysqli_num_rows($result);
              
                 
              if ($rows>0) {
                        

                ?>
<body style="background: rgb(255, 255, 255);font-size:14px;">
    <div class="bs-component">
        <div class="modal" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Booking #<?php echo $booking; ?></h4><a type="button" class="close" data-dismiss="modal" href="invoice.php" aria-label="Close"><span aria-hidden="true">×</span></a>
                    </div>
                    <div class="modal-body">
                        
                        <div class="table-responsive">
                         <table class="table table-striped table-sm my-0 mydatatable" style="font-size: 12px;">
                           
                                <thead style="background-color: rgb(237,14,0);color: rgb(255,255,255);">
                                    <tr>
                                        <th>Service Provider</th>
                                        
                                        <th>Services</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                          
                                <tbody>
      <?php
                    while ($rows=mysqli_fetch_array($result)) {
                          
                      $q=$rows['quantity'];
                      $p=$rows['price'];
                      $t=number_format($q*$p,2);
                        

                        
                  ?>

                                    <tr>
                                        <td><?php echo $rows['surname'].' '.$rows['name'];?></td>
                                        <td><?php echo $rows['type'];?></td>
                                        <td><?php echo $rows['disc'];?></td>
                                        
                                        <td>R <?php echo number_format($rows['price'],2);?></td>
                                   
                                        <td><?php echo $rows['quantity'];?></td>
                                        <td>R <?php echo $t;?></td>
                                    </tr>
                                    <?php
                  
                }
                ?>
                                </tbody>
                    
                            </table>
                            <?php
              }else{
                ?>
                
                <?php
              } ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <a class="btn" type="button" href="invoice.php" style="background: rgb(255,52,52);color: rgb(255,255,255);">Close&nbsp;<i class="fa fa-close"></i></a>
                   </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>