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
      
      $type=$_POST['servicetype'];
      $query1="SELECT count(service_id) as totcount FROM user,service
      WHERE  service.service_type='$type'
      AND user.email !='$email'
      AND user.user_id=service.user_id;";
      $result1=mysqli_query($conn,$query1);
      
      $row=mysqli_num_rows($result1);
      
      $row=mysqli_fetch_array($result1);
      //check location
      $query3="SELECT * FROM location
      WHERE  user_id='$id'";
      $result3=mysqli_query($conn,$query3);
      
      $row3=mysqli_num_rows($result3);
      
      $row3=mysqli_fetch_array($result3);





      //query


      $type=$_POST['servicetype'];
               // $type='Drinks';  
               
               if($row3['user_id']==$id)
               {

              $query="SELECT service.service_id as sid,user.surname as surname,user.name as name,user.email as email,user.phone_number as numbers,location.province as pro,location.city as city,location.suburb as suburb,location.street_name as str,location.stand_no as stand,service.image as image,
              service.service_type as service,service.quantity as qty,service.description as descrip,FORMAT(service.price,2) as total,
              FORMAT(service.price *.5,2) as half
              FROM user,service,location
              WHERE  service.service_type='$type'
              AND user.email !='$email'
              AND user.user_id=location.user_id
              AND user.user_id=service.user_id;";

               }else if($row3['user_id']!=$id)
               {

                echo '<script>alert("Add location first please!.");window.location = "profileDash.php";</script>';
                exit;

               }

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
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/dh-highlight-left-right.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Login-Form.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/Search-Field-With-Icon.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Swipe-Slider-9.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Product-List.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md shadow navigation-clean" style="background-color: rgb(237,14,0);color: rgb(255,255,255);">
            <div class="container"><a class="navbar-brand" href="index.php" style="font-family: Asap, sans-serif;font-weight: normal;color: rgb(255,255,255);">SAYFT&nbsp;<i class="fa fa-calendar"></i>&nbsp;</a><button class="navbar-toggler" data-toggle="collapse"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
        
        
            <ul class="nav navbar-nav flex-grow-1 justify-content-between">
                        <li></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="search.php" style="color: rgb(255,255,255);font-family: Asap, sans-serif;">Back</i></a></li>
                    </ul>
        </nav>
    </div>

    
            
    
            <div class="container" style="padding-top: 131px;">
        <?PHP
              
             
              
               

             
              $result=mysqli_query($conn,$query);
              
              $rows=mysqli_num_rows($result);
              
             
              
              if ($rows>0) {
                
                ?>
    
    <h2 class="text-center shadow-sm form-heading"style="font-size: 16px;,font-family: Asap, sans-serif;color: rgb(240,62,51);"><?php echo $type;?>&nbsp;<i class="fa fa-chevron-right" style="font-size:10px;" ></i> Searched Results (<?php echo $row['totcount'];?>)</h2>
    <div class="row product-list">
     <?php
                    while ($rows=mysqli_fetch_array($result)) {

                       $_SESSION['sid']=$rows['sid'];  
                       $id=$_SESSION['sid'];          
                  ?>
            <div class="col-sm-6 col-md-4 product-item">
            
                <div class="product-container">

               
                    <div class="row">
                        <div class="col-md-12" style="width: 200px;text-align: center;"><img src="images/<?php echo $rows['image'];?>" style="width: 200px;height: 150px;"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-8">
                            <h2><a href="#"><?php echo $rows['service'];?></a></h2>
                        </div>
                        <div class="col"><span style="font-size: 18px;font-weight: 600;">Qty :<?php echo $rows['qty'];?></span></div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="product-description"><?php echo $rows['descrip'];?>. </p>
                            <div class="row">
                                <div class="col-6"><a class="btn btn-light" type="submit" href="cart.php?id=<?php echo $id;?>" style="background: rgb(240,62,51);color:rgb(255,255,255);">Hire Now!</a></div>
                                <div class="col-6">
                                    <p class="product-price">R <?php echo $rows['total'];?> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p style="font-size: 12px;"><strong>Service Provided By</strong></p>
                                </div>
                                <div class="col-6">
                                    <p style="font-size: 12px;color: rgb(240,62,51);"><strong><?php echo $rows['surname'].' '. $rows['name'];?></strong></p>
                                </div>
                                <div class="col-6">
                                    <p style="font-size: 12px;"><strong>Contact Number</strong></p>
                                </div>
                                <div class="col-6">
                                    <p style="font-size: 12px;color: rgb(240,62,51);"><strong><?php echo $rows['numbers'];?></strong></p>
                                </div>
                                <div class="col-6">
                                    <p style="font-size: 12px;"><strong>Email</strong></p>
                                </div>
                                <div class="col-6">
                                    <p style="font-size: 12px;color: rgb(240,62,51);"><strong><?php echo $rows['email'];?></strong></p>
                                </div>
                                <div class="col-6">
                                    <p style="font-size: 12px;"><strong>Address</strong></p>
                                </div>
                                <div class="col-6">
                                    <p style="font-size: 12px;color: rgb(240,62,51);"><strong><?php echo $rows['pro'].','.$rows['city'];?>,
                                                                                              <?php echo $rows['suburb'].','.$rows['str'];?>,
                                                                                              <?php echo $rows['stand'];?>
                                                                                            </strong></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <?php
               
                
              
                  

                }
                ?>
            
        </div>
       
    </div> 
    
    <?php
              }else{
                ?>
                <h3 style="color: rgb(240,62,51);font-size: 26px;text-align:center;">No record(s) found</h3>
                <?php
              } ?>










   
</body>
<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
     <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/login-full-page-bs4.js"></script>
    <script src="assets/js/login-full-page-bs4-1.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Swipe-Slider-9.js"></script>
</html>