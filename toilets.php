<!DOCTYPE html>
<html>
<?php
    $conn = mysqli_connect("localhost","root","","sayft");
    
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
    
      
      $query1="SELECT count(service_id) as totcount FROM service
      WHERE service_type='Chairs';";
      $result1=mysqli_query($conn,$query1);
      
      $row=mysqli_num_rows($result1);
      
      $row=mysqli_fetch_array($result1);

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
    <div>
        <nav class="navbar navbar-light navbar-expand-md fixed-top shadow navigation-clean" style="background-color: rgb(237,14,0);color: rgb(255,255,255);opacity: 0.80;">
            <div class="container"><a class="navbar-brand" href="index.php" style="font-family: Asap, sans-serif;font-weight: normal;">SAYFT&nbsp;<i class="fa fa-calendar"></i>&nbsp;</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1" style="font-size: 17px;font-family: 'Advent Pro', sans-serif;">
                    <ul class="nav navbar-nav ml-auto" style="color: rgb(255,255,255);">
                        <li class="nav-item" role="presentation"><a class="nav-link" style="color: rgb(255,255,255);font-weight: normal;font-family: Asap, sans-serif;" href="index.php"><i class="fa fa-home"></i>&nbsp;Home&nbsp;</a></li>
                       
                        <li class="nav-item" role="presentation"><a class="nav-link" href="products.php" style="color: rgb(255,255,255);font-family: Asap, sans-serif;"><i class="fa fa-laptop"></i>&nbsp;Our Products&nbsp;</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link border rounded-0" href="login.php" style="color: rgb(240,62,51);font-family: Asap, sans-serif;background-color: #ffffff;"><i class="fa fa-laptop"></i>&nbsp;Login</a></li>
                        <li class="nav-item border rounded-0 border-white"
                            role="presentation"><a class="nav-link border-white" href="register.php" style="color: rgb(255,255,255);font-family: Asap, sans-serif;"><i class="fa fa-laptop"></i>&nbsp;Register</a></li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
    <div class="container" style="margin-top: 130px;">
        <form class="search-form">
            <div class="input-group text-left">
                <div class="input-group-prepend"><span class="input-group-text" style="color: rgb(240,62,51);background-color: rgb(255,255,255);"><i class="fa fa-list-alt"></i></span>
                    <div class="dropdown btn-group" role="group"><button class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: rgb(240,62,51);color: rgb(255,255,255);">Category Navigator</button>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="chairs.php">Chairs</a><a class="dropdown-item" role="presentation" href="tables.php">Tables</a><a class="dropdown-item" role="presentation" href="drinks">Drinks</a><a class="dropdown-item" role="presentation"
                                href="toilets.php">Mobile Toilets</a><a class="dropdown-item" role="presentation" href="tents.php">Tents</a><a class="dropdown-item" role="presentation" href="halls.php">Hall</a><a class="dropdown-item" role="presentation" href="gardens.php">Gardern</a><a class="dropdown-item"
                                role="presentation" href="sofas.php">Couches</a><a class="dropdown-item" role="presentation" href="fridges.php">Mobile Refridgerator</a><a class="dropdown-item" role="presentation" href="foods.php">Food</a></div>
                    </div>
                </div>
                <div class="input-group-append"></div>
            </div>
        </form>
       
    </div>
    <div class="container">
        <h1 style="font-size: 30px;color: rgb(240,62,51);">Mobile Toilets Available</h1>
        <hr style="background-color: rgb(240,62,51);">
        <?PHP
              
             
              
              // $type=$_POST['servicetype'];
               // $type='Drinks';              

              $query="SELECT * FROM service
              WHERE service_type='Mobile Toilets';";

              $result=mysqli_query($conn,$query);
              
              $rows=mysqli_num_rows($result);
              
             
              
              if ($rows>0) {

            
              
                ?>
        <div class="gift row gift--double no-border">
        <?php
                    while ($rows=mysqli_fetch_array($result)) {
                       
                
                        
                  ?>
            <div class="col-12 col-sm-6">
                <div class="gift__img col-12"><img src="images/<?php echo $rows['image'];?>" style="width: 150px;"></div>
                <div class="gift__info col-12">
                    <h4 class="gift__name"><?php echo $rows['service_type'];?></h4>
                    <div class="gift__details">
                        <p><?php echo $rows['description'];?></p>
                    </div>
                    <div class="gift__bottom row">
                        <div class="gift__price-wrap col-12">
                            <div class="gift__today-price"><span>Price:&nbsp;</span><span class="gift__data">ZAR <?php echo $rows['price'];?>!</span></div>
                            <div class="gift__quantity-left"><span>Qty Left: </span><span class="gift__data"><?php echo $rows['quantity'];?></span></div>
                        </div>
                        <div class="gift__cta-wrap col-12"><a class="flux_cta gift__cta" target="_blank" href="login.php" style="background-color: rgb(240,62,51);">Hire Now!</a></div>
                    </div>
                </div>
            </div><?php
                  
                }
                ?>
            
        </div><?php
              }else{
                ?>
                <br>
                <h3 style="color: rgb(240,62,51);font-size: 18px;text-align:center;">No Mobile toilets to Hire at the moment.</h3>
                <?php
              } ?>
    </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

      
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/login-full-page-bs4.js"></script>
    <script src="assets/js/login-full-page-bs4-1.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="assets/js/Swipe-Slider-9.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>