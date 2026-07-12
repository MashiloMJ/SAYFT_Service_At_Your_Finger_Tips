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
    <link rel="stylesheet" href="assets/css/Data-Table-with-Search-Sort-Filter-and-Zoom-using-TableSorter.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
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
              user.name as name,
              location.province as pro,
              location.city as city,
              location.suburb as suburb,
              location.street_name as str,
              location.stand_no as stn
          FROM
              booking_details,
              booking,
              service,
              user,
              location
          WHERE
             user.user_id=booking_details.user_id AND user.user_id=location.user_id AND booking_details.booking_id = booking.booking_id AND service.service_id = booking_details.service_id AND booking_details.booking_id =(
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
                        <h4>Booking #<?php echo $booking; ?></h4><a type="button" class="close" data-dismiss="modal" href="bookingsdone.php" aria-label="Close"><span aria-hidden="true">×</span></a>
                    </div>
                    <div class="modal-body">
                        
                        <div class="table-responsive">
                            <table class="table">
                            
                                <thead style="background-color: rgb(237,14,0);color: rgb(255,255,255);">
                                    <tr>
                                        
                                        <th>Client</th>
                                        <th>Address</th>
                                        <th>Services</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <?php
                    while ($rows=mysqli_fetch_array($result)) {
                          
                      $q=$rows['quantity'];
                      $p=$rows['price'];
                      $t=number_format($q*$p,2);
                      

                        
                  ?>
                                <tbody>
                                    <tr>
                                        
                                        <td><?php echo $rows['surname'].' '.$rows['name'];?></td>
                                        <td><?php echo $rows['pro'].','.$rows['city'].','.$rows['suburb'].','.$rows['str'].','.$rows['stn'];?></td>
                                        <td><?php echo $rows['type'];?></td>
                                        <td><?php echo $rows['disc'];?></td>
                                        <td>R<?php echo number_format($rows['price'],2);?></td>
                                        <td><?php echo $rows['quantity'];?></td>
                                        <td>R<?php echo $t;?></td>
                                    </tr>
                                </tbody>
                                <?php
                  
                }
                ?>
                            </table>
                            <?php
              }else{
                ?>
                
                <?php
              } ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <a class="btn" type="button" href="bookingsdone.php" style="background: rgb(255,52,52);color: rgb(255,255,255);">Close&nbsp;<i class="fa fa-close"></i></a>
                   </div>
                </div>
            </div>
        </div>
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
    <script src="assets/js/Data-Table-with-Search-Sort-Filter-and-Zoom-using-TableSorter.js"></script>
    <script src="assets/js/HTML-Table-to-Excel-V2.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Table-with-search-1.js"></script>
</body>

</html>