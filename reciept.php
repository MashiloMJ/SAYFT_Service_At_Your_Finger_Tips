

<!DOCTYPE html>


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
      
      $booking=$_GET['edt'];


           
$query="select user.name as nam,user.surname as sur,user.phone_number as phone,user.email as em,location.province as prov,location.city as cit,location.suburb as sub,location.street_name as str,location.stand_no as stn
        ,DATE_FORMAT(booking.booking_date,' %d-%m-%Y') as date,DATE_FORMAT(booking.booking_date,' %H:%i') as time
        from user,location,booking
        where user.user_id=location.user_id
        And booking.user_id=user.user_id
        And booking.booking_id='$booking'
        GROUP BY user.name";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
      
    ?>


<html>
	<head>
		<meta charset="utf-8" />
		
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Almarai">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=DM+Mono">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/canitoLogin.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alata">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
			
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Almarai, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>

<link rel="icon" href="logo1.png">
<title>Booking #<?php echo $booking ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
	</head>

	<body style="font-family: Almarai, sans-serif;border-top-style: none;">
		<div class="invoice-box" style="margin-top: 25px;">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="6">
						<table style="text-align:centre;">
							<tr>
								<td class="title">
									<img src="logo.png" style="width: 100%; max-width: 150px" />
								</td>
                               	
					
								<td style="text-align:centre;">
									Booking #:<?php echo $booking ?><br />
									Boking date: <?php echo $row['date'] ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="6">
						<table>
							<tr>
                            <td style="text-align:centre;">
									
									<i class="fa fa-user" style="color: rgb(237,14,0);"></i>To:&nbsp;<span style="color: rgb(237,14,0);"><strong><?php echo $row['nam'].' '.$row['sur']; ?></strong></span><br />
                                    <i class="fa fa-envelope" style="color: rgb(237,14,0);"></i>Email:&nbsp;<span><?php echo $row['em'] ?></span><br />
                                    <i class="fa fa-phone" style="color: rgb(237,14,0);"></i>Phone:&nbsp;<span><?php echo $row['phone'] ?></span>
								</td>
                                
								<td>
                                <?php echo $row['prov']?><br />
                                <?php echo $row['cit'].','.$row['sub']?><br />
								<?php echo $row['str'].','.$row['stn']?>
								</td>
                               	
				

								
							</tr>
						</table>
					</td>
				</tr>

        

				<tr class="heading">
					<td>Service</td>
					<td style="text-align:left;">Description</td>

					<td>Quantity</td>
					
					<td>Price</td>
				</tr>
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
             user.user_id=service.user_id AND booking_details.booking_id = booking.booking_id AND service.service_id = booking_details.service_id AND booking_details.booking_id = '$booking'
          ";

              $result=mysqli_query($conn,$query);
              
              $rows=mysqli_num_rows($result);
              
                 
              if ($rows>0) {
                        

                ?>
                <?php
                        
                        $total=0;
                    while ($rows=mysqli_fetch_array($result)) {
                          
                      $q=$rows['quantity'];
                      $p=$rows['price'];
                      $t=$q*$p;
                       $total+=$t; 
                     
                        
                  ?>
				<tr class="item">
					<td><?php echo $rows['type']?></td>
					<td style="text-align:left;"><?php echo $rows['disc']?></td>
					
                    <td><?php echo $rows['quantity']?></td>

                    <td><?php echo number_format($rows['price'],2)?></td>
				</tr>

                <td></td>
                                    



                <?php
                 
              

               }
               ?>
                              <?php
             }else{
               ?>
               
               <?php
             } ?>
				<tr >
					<td></td>	
					<td></td>	
					<td></td>	

					<td style="color: rgb(237,14,0);"><strong>Total: R<?php echo number_format($total,2); ?></strong></td>
				</tr>
			</table>

			<div class="page-tools">
				<div class="action-buttons">
					<a class="btn bg-white btn-light mx-1px text-95" onclick="window.print()" data-title="Print">
						<i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
						Print
					</a>
				   
				</div>
			</div>
		</div>
		
	</body>
</html>
