
<?php

$connect=mysqli_connect("localhost","root","","sayft");

$id=$_GET['edt'];

//$idd=$_SESSION['user_id'];

if(isset($_POST['add']))
{
    
    
$allow=array('jpg');
$temp=explode(".",$_FILES['photo']['name']);
$extension=end($temp);
$upload_file=$_FILES['photo']['name'];
move_uploaded_file($_FILES['photo']['tmp_name'],"images/".$_FILES['photo']['name']);

//$qry=mysqli_query($con,"Insert into `pdf`(`file`) VALUES('".$upload_file."')");

    
   
$servicetype=$_POST['servicetype'];
$qty=$_POST['qty'];
$doc="$upload_file";
$description=$_POST['description'];
$price=$_POST['price'];
   


$command="
INSERT INTO service(user_id,service_type ,quantity, image, description, price) 
            VALUES ('$id','$servicetype','$qty','".$upload_file."','$description','$price')";



$edit=mysqli_query($connect,$command);  


if($edit){
mysqli_close($connect);

echo '<script>alert(" service added successfully");window.location = "sprofileDash.php";</script>';

exit;

}

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
<script>

    
function validateForm() 
{
var derror=document.getElementById("derror");
var serviceerror=document.getElementById("serviceerror");
var errorpic=document.getElementById("errorpic");
var errorprice=document.getElementById("errorprice");
var errorqty=document.getElementById("errorqty");


if(
    document.forms["form"]["price"].value==""&&   
 document.forms["form"]["description"].value==""&&
 document.forms["form"]["qty"].value==""&&
 document.forms["form"]["photo"].value==""&&
 document.forms["form"]["servicetype"].value==""

 )
{


serviceerror.innerHTML="<span style='color:red;''>"+" please select service. *</span>"
errorpic.innerHTML="<span style='color:red;''>"+" please upload an image. *</span>"
errorprice.innerHTML="<span style='color:red;''>"+" Please fill the service price. *</span>"
derror.innerHTML="<span style='color:red;''>"+" Provide description of the Service. *</span>"
errorqty.innerHTML="<span style='color:red;''>"+" Provide Quantity of the Service(s). *</span>"

return false;


}else
{
//Service
    var servicetype=document.forms["form"]["servicetype"].value;


if(servicetype=="")
{

    serviceerror.innerHTML="<span style='color:red;''>"+" field should be selected *</span>";
  return false;


}else
{

    serviceerror.innerHTML="";  
}
//photo
var photo=document.forms["form"]["photo"].value;



if(photo=="")
{

    errorpic.innerHTML="<span style='color:red;''>"+" field should be selected *</span>";
  return false;


}else if(!(/\.(gif|jpe?g|tiff?|png|webp|bmp)$/i).test(photo))
{
    errorpic.innerHTML="<span style='color:red;''>"+" file extension should be (.jpg,.png,.jpeg,.gif).*</span>";

 
  return false;

}
else
{

    errorpic.innerHTML="";  
}
///desc

    var description=document.forms["form"]["description"].value;


if(description=="")
{

   derror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}  
else if(!description.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/))
{
derror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

derror.innerHTML="";  
}

}
}
</script>
<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md fixed-top shadow navigation-clean" style="background-color: rgb(237,14,0);color: rgb(255,255,255);opacity: 0.80;">
            <div class="container"><a class="navbar-brand" href="" style="font-family: Asap, sans-serif;font-weight: normal;">SAYFT&nbsp;<i class="fa fa-calendar"></i>&nbsp;</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1" style="font-size: 17px;font-family: 'Advent Pro', sans-serif;">
                    <ul class="nav navbar-nav ml-auto" style="color: rgb(255,255,255);">
                        
                    </ul>
            </div>
    </div>
    </nav>
    </div>
    <div class="row login-form">
        <div class="col-md-4 offset-md-4" style="padding-top: 131px;">
            <h2 class="text-center shadow-sm form-heading" style="font-family: Asap, sans-serif;font-weight: normal;color: rgb(240,62,51);">Service&nbsp;<i class="fa fa-file-text"></i></h2>
            <form class="text-white border-white shadow custom-form" action="" name="form"  enctype="multipart/form-data" onsubmit="return validateForm();" method="post">
                <div class="col">
                    <h1 style="font-size: 16px;font-family: Asap, sans-serif;color: rgb(240,62,51);font-style: italic;">Provide Service Details</h1>
                    <hr style="background-color: #f03e33;">
                </div>
                <div class="form-group"><select name="servicetype" id="servicetype" class="form-control" style="font-family: Asap, sans-serif;">
                    <optgroup label="Service Type">
                        <option value="" selected="">Select Service</option>
                        <option value="Chairs">Chairs</option>
                        <option value="Tents">Tents</option>
                        <option value="Tables">Tables</option>
                        <option value="Hall">Hall</option>
                        <option value="Gardens">Gardens</option>
                        <option value="Couches">Couches</option>
                        <option value="Food">Food</option>
                        <option value="Drinks">Drinks</option>
                        <option value="Mobile Toilets">Mobile Toilets</option>
                        <option value="Mobile Refridgerator">Mobile Refridgerator</option>
                    </optgroup></select><span id="serviceerror"></span></div>
                <h1
                    style="font-size: 16px;font-family: Asap, sans-serif;color: rgb(85,5,255);font-style: oblique;">Upload image of service Item below.</h1>
                    <div class="form-group"><input class="form-control" name="photo" id="photo" accept="image/x-png,image/jpeg,image/jpg" style="font-family: Asap, sans-serif;" type="file" style="font-family: Asap, sans-serif;"><span id="errorpic"></span></div>
                    <div class="form-group"><input class="form-control" name="qty" id="qty" min="0" step="1" max="1000000000" type="number" placeholder="Quantity"><span id="errorqty"></span></div>
                    <div class="form-group"><textarea class="form-control" name="description" id="description" placeholder="Description"></textarea><span id="derror"></span></div>
                    <div class="form-group"><input class="form-control" name="price" id="price" type="number" placeholder="Item price" min="0.00" max="100000.00" step="0.01"><span id="errorprice"></span></div>
                 
                    <input class="btn btn-light btn-block btn-sm submit-button" type="submit" name="add" value="add" style="background-color: rgb(240,62,51);font-weight: normal;font-family: Asap, sans-serif;font-size: 16px;">Add Service</button>
                    <a
                        href="sprofileDash.php" style="color: rgb(240,62,51);font-family: Asap, sans-serif;">Cancel</a>
            </form>
        </div>
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