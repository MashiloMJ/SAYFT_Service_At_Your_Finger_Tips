<!DOCTYPE html>
<html>
<?php
    $conn = mysqli_connect("localhost","root","","sayft");
    
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
     

    ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Articale-List-With-Image-Zoom.css">
    <link rel="stylesheet" href="assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="assets/css/Customizable-Background--Overlay.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed-Remixed-1.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed-Remixed-2.css">
    <link rel="stylesheet" href="assets/css/Pretty-Search-Form.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed-Remixed-3.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed-Remixed.css">
    <link rel="stylesheet" href="assets/css/gift-product-small-double.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container">
        <form class="search-form">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text" style="color: rgb(240,62,51);background-color: rgb(255,255,255);"><i class="fa fa-search"></i></span>
                    <div class="dropdown btn-group" role="group"><button class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: rgb(240,62,51);color: rgb(255,255,255);">Category Navigator</button>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Chairs</a><a class="dropdown-item" role="presentation" href="#">Tables</a><a class="dropdown-item" role="presentation" href="#">Drinks</a><a class="dropdown-item" role="presentation"
                                href="#">Mobile Toilets</a><a class="dropdown-item" role="presentation" href="#">Tents</a><a class="dropdown-item" role="presentation" href="#">Hall</a><a class="dropdown-item" role="presentation" href="#">Gardern</a><a class="dropdown-item"
                                role="presentation" href="#">Couches</a><a class="dropdown-item" role="presentation" href="#">Mobile Refridgerator</a><a class="dropdown-item" role="presentation" href="#">Food</a></div>
                    </div>
                </div>
                <div class="input-group-append"></div>
            </div>
        </form>
        <?PHP
              
             
              
              // $type=$_POST['servicetype'];
               // $type='Drinks';              

              $query="select * from service where service_type='Tables'";
             

              $result=mysqli_query($conn,$query);
              
              $rows=mysqli_num_rows($result);
              
             
              
              if ($rows>0) {

            
              
                ?>
            
    </div>
   
    <div class="container" style="margin-top: 41px;">
        
       
            <h2 class="text-left" style="color: rgb(240,62,51);font-size: 29px;"><i class="fa fa-search" style="font-size: 24px;"></i>&nbsp;<?php echo $rows['service_type']?>&nbsp;<span style="color: rgb(240,62,51);font-size: 26px;">(15)</span></h2>
 
        <?php
                    while ($rows=mysqli_fetch_array($result)) {
                       
                    
                        
                  ?>
    </div>
    <div class="container">
        <hr style="background-color: rgb(240,62,51);">
        <div class="gift row gift--double no-border">
            <div class="col-12 col-sm-6">
            <div><img src="images/<?php echo $rows['image'];?>" style="width: 150px;"></div>
                <div class="gift__info col-12">
                    <h4 class="gift__name"><?php echo $rows['service_type']?></h4>
                    <div class="gift__details">
                        <p><?php echo $rows['description']?>.</p>
                    </div>
                    <div class="gift__bottom row">
                        <div class="gift__price-wrap col-12">
                            <div class="gift__today-price"><span>Booking Price:&nbsp;</span><span class="gift__data"><?php echo $rows['price']?></span></div>
                            <div class="gift__quantity-left"><span>Qty Left: </span><span class="gift__data"><?php echo $rows['quantity']?></span></div>
                        </div>
                        <div class="gift__cta-wrap col-12"><a class="flux_cta gift__cta" target="_blank" href="#" style="background-color: rgb(240,62,51);">Book Now!</a></div>
                    </div>
                </div>
            </div>
            
            <?php
                  
                }
                ?>
        </div>
        <?php
              }else{
                ?>
    </div>
    <?php
              } ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>