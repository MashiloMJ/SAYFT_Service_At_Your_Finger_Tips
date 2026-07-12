<!DOCTYPE html>
<html>
<?php
    $conn = mysqli_connect("localhost","root","","sayft");
    //cart Check
   
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
     
      if(!isset($_SESSION)) 
      { 
          session_start(); 
          $email=$_SESSION['email'];
          $id=$_SESSION['user_id'];
      }

      $qry="SELECT * from location where user_id='$id'";
      $res=mysqli_query($conn,$qry);
    
      $data=mysqli_fetch_array($res);




          
if($data['user_id']==$id)
{

    $message="";
    $none="style='display:none;'";
   

}else
{

    $message="Profile Status : 50% (Please add your Address)"; 
   $none="";

}


    ?>
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
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Login-Form.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Swipe-Slider-9.css">
</head>

<body style="font-family: 'Advent Pro', sans-serif;">
    <div>
        <nav class="navbar navbar-light navbar-expand-md sticky-top shadow navigation-clean" style="background-color: rgb(237,14,0);color: rgb(255,255,255);opacity: 0.80;">
            <div class="container"><a class="navbar-brand" href="logout.php" style="font-family: Asap, sans-serif;font-weight: normal;">&nbsp;<i class="fa fa-arrow-circle-left"></i>&nbsp;</a><a class="navbar-brand" href="#" style="font-family: Asap, sans-serif;font-weight: normal;">SAYFT&nbsp;<i class="fa fa-calendar"></i>&nbsp;</a>
                <button
                    data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1" style="font-size: 17px;font-family: 'Advent Pro', sans-serif;">
                        <ul class="nav navbar-nav ml-auto" style="color: rgb(255,255,255);"></ul>
                    </div>
            </div>
        </nav>
    </div>

    <?PHP
              
             

               

                              

              $query="SELECT * from user where email='$email'";
              $result=mysqli_query($conn,$query);
              
              $rows=mysqli_num_rows($result);
              
             
              
              if ($rows>0) {
                
                ?>

    <div class="container-fluid main-panel" style="padding-top: 142px;">
        <div class="row">
        <?php
                    while ($rows=mysqli_fetch_array($result)) {
                  ?>
            <div class="col d-flex justify-content-center align-items-center">
                <div data-bs-hover-animate="bounce" class="login-panel" style="padding-top: 0px;height: 700px;width: 601px;">
                    <div class="col" style="color: rgb(240,62,51);">
                        <h1 class="text-center"><i class="material-icons border rounded-circle" style="font-size: 119px;opacity: 1;color: rgb(240,62,51);padding-top: 0px;margin-top: 26px;">vpn_key</i></h1>
                        <h1 class="text-center" style="font-family: Asap, sans-serif;"><?php echo $rows['surname'].' '. $rows['name'];?></h1>
                       
                   
        <div class="container">
    <div class="form-row">
        <div class="col-md-6">
        <div class="dropdown btn-group" role="group">
                        <button class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: rgb(240,62,51);color: rgb(255,255,255);">Profile Options</button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" role="presentation"href="updateClient.php?edt=<?php echo $rows['email'];?>">Update Personal details</a>
                            <a class="dropdown-item" <?php echo $none;?> role="presentation" href="address.php?edt=<?php echo $rows['email'];?>">Add Address</a>
                            <a class="dropdown-item" role="presentation"href="addressview.php">View Address</a>
                       
                            <a class="dropdown-item" role="presentation"href="deleteClient.php?edt=<?php echo $rows['email'];?>">Delete Account</a>
                           
                            
                           
                            <a class="dropdown-item" role="presentation"href="logout.php">logout</a>
                           
                        </div>
                    </div>
        </div>
        <div class="col-md-6">
        <div class="dropdown btn-group" role="group">
                        <button class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: rgb(240,62,51);color: rgb(255,255,255);">Booking Options</button>
                        <div class="dropdown-menu" role="menu">
                         
                       
                            <a class="dropdown-item" role="presentation" href="search.php">Check Services</a>
                      <a class="dropdown-item" role="presentation" href="invoice.php?edt=<?php echo $rows['user_id'];?>">My Bookings</a>
                        
                     
                           
                        </div>
                    </div>
        </div>
    </div>
</div>
        
                        <hr style="background-color: #f03e33;">
                        <tr>
                                       
                                    </tr><br><br>
                                    <?php echo $message;?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="background-color: #f03e33;">
                                    <tr>
                                        <th style="color: rgb(255,255,255);font-family: Asap, sans-serif;font-weight: normal;"><i class="fa fa-user"></i>&nbsp;Personal Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <td style="font-family: Asap, sans-serif;">Id Number :&nbsp;<?php echo $rows['id_number'];?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: Asap, sans-serif;">Age :&nbsp;<?php echo $rows['age'];?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: Asap, sans-serif;">Gender :&nbsp;<?php echo $rows['gender'];?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: Asap, sans-serif;">Email :&nbsp;<?php echo $rows['email'];?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: Asap, sans-serif;">Phone Number :&nbsp;<?php echo $rows['phone_number'];?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: Asap, sans-serif;">Account Type :&nbsp;<?php echo $rows['account_type'];?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                       
                                <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>

                                    </tr>
                                </thead>
                              
                            </table>
                        </div>
                                <?php
                  
                }
                ?>
                            </table>

                            <?php
              }else{
                ?>
                <h3>No record(s)</h3>
                <?php
              } ?>
                        </div>
                    </div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/login-full-page-bs4.js"></script>
    <script src="assets/js/login-full-page-bs4-1.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="assets/js/Swipe-Slider-9.js"></script>
</body>

</html>