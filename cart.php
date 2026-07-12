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

   
      
      $query="SELECT * FROM location WHERE user_id='$id'";
      $feedback= mysqli_query($conn,$query);
      $getdata=mysqli_fetch_array($feedback);


      ?>

<?php
$conn = mysqli_connect("localhost","root","","sayft");


require 'item.php';


if (isset ( $_GET ['id'] ) && !isset($_POST['update'])) {

	$result = mysqli_query ( $conn, 'select * from service where service_id=' . $_GET ['id'] );
	$service = mysqli_fetch_object ( $result );
	$item = new Item ();
	$item->service_id = $service->service_id;
	$item->service_type = $service->service_type;
    $item->image = $service->image;
	$item->price = $service->price;
	$item->quantity = 1;
	// Check product is existing in cart
	$index = - 1;
	if (isset ( $_SESSION ['cart'] )) {
		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		for($i = 0; $i < count ( $cart ); $i ++)
		if ($cart [$i]->service_id == $_GET ['id']) {
			$index = $i;
			break;
		}
	}
	if ($index == - 1)
	$_SESSION ['cart'] [] = $item;
	else {
		$cart [$index]->quantity ++;
		$_SESSION ['cart'] = $cart;
	}
}

// Delete product in cart
if (isset ( $_GET ['index'] ) && !isset($_POST['update'])) {
	$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
	unset ( $cart [$_GET ['index']] );
	$cart = array_values ( $cart );
	$_SESSION ['cart'] = $cart;
}

// Update quantity in cart
if(isset($_POST['update'])) {
	$arrQuantity = $_POST['quantity'];

	// Check validate quantity
	$valid = 1;
	for($i=0; $i<count($arrQuantity); $i++)
	if(!is_numeric($arrQuantity[$i]) || $arrQuantity[$i] < 1){
		$valid = 0;
		break;
	}
	if($valid==1){
		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		for($i = 0; $i < count ( $cart ); $i ++) {
			$cart[$i]->quantity = $arrQuantity[$i];
		}
		$_SESSION ['cart'] = $cart;
	}
	else
		$error = 'Quantity is InValid';
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SAYFT</title>
    <link rel="icon" href="assets/logo1.png">
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
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md shadow navigation-clean" style="background-color: rgb(237,14,0);color: rgb(255,255,255);opacity: 0.80;">
            <div class="container"><a class="navbar-brand" href="index.php" style="font-family: Asap, sans-serif;font-weight: normal;">SAYFT&nbsp;<i class="fa fa-calendar"></i>&nbsp;</a><button class="navbar-toggler" data-toggle="collapse"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
        
        
            <ul class="nav navbar-nav flex-grow-1 justify-content-between">
                        <li></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="profileDash.php" style="color: rgb(255,255,255);font-family: Asap, sans-serif;">Back</i></a></li>
                    </ul>
        </nav>
    </div>

    <div class="container" style="margin-top: 130px;">
        <ol class="breadcrumb DeskView" style="background: rgb(240,62,51);">
            <li class="breadcrumb-item"><a href="profileDash.php"><span style="color: rgb(255,255,255);">Back to account</span></a></li>
            <li class="breadcrumb-item"><a href="search.php"><span style="color: rgb(255,255,255);">Check Services</span></a></li>
            <li class="breadcrumb-item active"><span style="color: rgb(255,255,255);">Cart</span></li>
</ol> 
<form method="post">
            <?php echo isset($error) ? $error : ''; ?>





        
        <div class="row">
       
            <div class="col-12 col-lg-6">

            <?php

        //check session

		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		$s = 0;
		$index = 0;
		for($i = 0; $i < count ( $cart ); $i ++) {
			$s += $cart [$i]->price * $cart [$i]->quantity;

           
			?>


                <div class="card shadow mb-3">
                
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-4 text-center"><img class="img-fluid border rounded shadow" src="images/<?php echo $cart[$i]->image; ?>"></div>
                            <div class="col">
                                <p class="mt-2"><strong><?php echo $cart[$i]->service_type; ?></strong><span class="text-success"><strong>&nbsp;</strong><i class="material-icons" style="font-size: 16px;">verified_user</i><strong>Verified Seller</strong></span></p>
                                <p class="mt-2"><strong>R <?php echo number_format($cart[$i]->price,2); ?></strong></p>
                                <p class="mt-2"><strong>Total R <?php echo number_format($cart[$i]->price * $cart[$i]->quantity,2); ?></strong></p>
                                <div class="row">
                                    <div class="col">
                                        
                                        <div class="form-group"><input class="form-control" type="number" placeholder="Qty." min="1" max="" value="<?php echo $cart[$i]->quantity; ?>" name="quantity[]"><input
				type="hidden" name="update"><input type="image" hidden></div>
                                        
                                    </div>
                                    <div class="col">
                                        
                                            <div class="form-group"><a class="btn" href="cart.php?index=<?php echo $index; ?>"onclick="return confirm('Are you sure?')"  type="submit" style="background: rgb(240,62,51);color: rgb(255,255,255);"><i class="fa fa-trash-o"></i>&nbsp;Remove </a></div>
                                            
                                            
                                       
                                       
                                    </div>
                                   
                                </div>
                            </div>
               
                            </div>
                    
                        </div>
                     
                </div>
               
                <?php
		$index ++;
		}
		?>

</form>



                
            </div>
            <div class="col-12 col-lg-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p>Service(s) Cost</p>
                            </div>
                            <div class="col">
                                <p class="text-right">R <?php echo number_format($s,2); ?></p>
                            </div>
                        </div>
                       
                       
                        <hr style="background: #323232;">
                        <div class="row">
                            <div class="col">
                                <p style="font-size: 18px;"><strong>Total</strong></p>
                            </div>
                            <div class="col">
                                <p class="text-right" style="font-size: 18px;"><strong>R <?php echo number_format($s,2); ?></strong></p>
                            </div>

                            <?php
                            
                           
                            $_SESSION['amount']=$s;
                            $amount=$_SESSION['amount'];
                          
                            
                            ?>
                        </div>
                        <hr style="background: #323232;">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <p style="font-weight: 500;font-style:italic;font-size:14px;color:RGB(237,14,0);">Deposit fee must be 50% or more of the total amount</p>
								<p style="font-weight: 500;font-style:italic;font-size:14px;color:RGB(237,14,0);">Cancellation fee is 20% of the total amount</p>
                            </div>
                           
                        </div><div class="row">
                            <div class="col-12 col-sm-6">
                                <p style="font-weight: 500;">Check Out</p>
                            </div>
                            <div class="col"><a class="btn btn-block" href="cart-payment.php" type="submit" style="background: rgb(240,62,51);color: rgb(255,255,255);"><i class="fa fa-money"></i>&nbsp;Check Out</a></div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Shipping<i class="material-icons" style="font-size: 16px;color: rgb(16,202,0);">verified_user</i>&nbsp; Verified Address&nbsp;</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody style="">
                            
                                    <tr>  
                                    <td><?php echo $getdata['province'].', '.$getdata['city'].', '.$getdata['suburb'].', '.$getdata['street_name'].', '.$getdata['stand_no'];  ?></td>
                                        </tr>
                                        <tr>
                                       
                                       
                                      
                                    
                        
                                    </tr>
                                    <tr></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>






    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/login-full-page-bs4.js"></script>
    <script src="assets/js/login-full-page-bs4-1.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Swipe-Slider-9.js"></script>
</body>

</html>