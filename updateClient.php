<!DOCTYPE html>
<?php
    $conn = mysqli_connect("localhost","root","","sayft");
    
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
     session_start();
     $email=$_SESSION['email'];
    ?>
<html>
<?php


$id=$_GET['edt'];


$qry=mysqli_query($conn,"select * from user WHERE email='$id'");
$data=mysqli_fetch_array($qry);


if(isset($_POST['update']))
{

    
    
$name=$_POST['name'];
$surname=$_POST['surname'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$cellno=$_POST['cellno'];

$accounttype=$_POST['accounttype'];
$idno=$_POST['idno'];
//$password=md5($_POST['password']);
  

  
$command="UPDATE  user
 SET 
 name='$name', surname='$surname',id_number='$idno', gender='$gender', email='$email', phone_number='$cellno',account_type='$accounttype' 
 WHERE email='$id'";



$edit=mysqli_query($conn,$command);
  

if($edit){
mysqli_close($conn);

     
echo '<script>alert("Information Updated.");window.location = "profileDash.php";</script>';

exit;

}
else
{
    echo mysqli_error();

}
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
<script>

    
function validateForm() 
{
var nerror=document.getElementById("nerror");
var serror=document.getElementById("serror");
var gerror=document.getElementById("gerror");
var cerror=document.getElementById("cerror");
var error=document.getElementById("error");
var iderror=document.getElementById("iderror");
var standerror=document.getElementById("standerror");
var streeterror=document.getElementById("streeterror");
var suberror=document.getElementById("suberror");
var cityerror=document.getElementById("cityerror");
var proverror=document.getElementById("proverror");

var accounttypeerror=document.getElementById("accounttypeerror");


var errormessage=document.getElementById("errorpass");
var ierror=document.getElementById("ierror");

if(document.forms["form"]["name"].value==""&&
 document.forms["form"]["surname"].value==""&&
 document.forms["form"]["gender"].value==""&&
 document.forms["form"]["idno"].value==""&&
 document.forms["form"]["cellno"].value==""&&
 document.forms["form"]["email"].value==""&&
 

 document.forms["form"]["accounttype"].value==""&&


 )
{

nerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
gerror.innerHTML="<span style='color:red;''>"+" select gender please!*</span>"
cerror.innerHTML="<span style='color:red;''>"+" field should not be empty*</span>"
error.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
iderror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"


accounttypeerror.innerHTML="<span style='color:red;''>"+" Select Account type please! *</span>"

errormessage.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"

return false;


}else
{
//name 
var name=document.forms["form"]["name"].value;


if(name=="")
{

   nerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}else if(!name.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z ]$/))
{
nerror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

nerror.innerHTML=""; 
}
//surname

var surname=document.forms["form"]["surname"].value;


if(surname=="")
{

   serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else if(!surname.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/))
{
serror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

serror.innerHTML="";  
}
//id

var idno=document.forms["form"]["idno"].value;

if(idno=="")
{

  iderror.innerHTML="<span style='color:red;''>"+" Id number field should not be empty.*</span>";

  return false;


}else
if(idno.toString().length!=13)
{

iderror.innerHTML="<span style='color:red;''>"+" Please check your Id number length,it should be 13. *</span>"
return false;

}
else 
if(!idno.match(/^[0-9]+$/))
{

iderror.innerHTML="<span style='color:red;''>"+" id number field should be filled with number only. *</span>"
return false;  
}



var cit=idno.slice(10,11);
   if(cit!="0")
   {
 
   iderror.innerHTML="<span style='color:red;''>"+" Invalid Id Number,Youre not a RSA citizen. *</span>"
return false;    
   }

var cite=idno.slice(11,12);
   if(cite!="8")
   {
    iderror.innerHTML="<span style='color:red;''>"+" Invalid Id Number. *</span>"
return false;    
   } 
   var idno=document.forms["form"]["idno"].value;
   if(!idno.match(/^(((\d{2}((0[13578]|1[02])(0[1-9]|[12]\d|3[01])|(0[13456789]|1[012])(0[1-9]|[12]\d|30)|02(0[1-9]|1\d|2[0-8])))|([02468][048]|[13579][26])0229))(( |-)(\d{4})( |-)(\d{3})|(\d{7}))/))
   {               
    iderror.innerHTML="<span style='color:red;''>"+" Invalid Id Number. *</span>"
return false;    
   } 
  else
{
  iderror.innerHTML="";

}

//addtional

//check year
//check year

var gender=idno.substring(6,7);

if(gender <= "4")
{
  
  document.forms["form"]["gender"].value="Female";
  return true; 

}else
{

  document.forms["form"]["gender"].value="Male";
 
}

//gender
var gender=document.forms["form"]["gender"].value;


if(gender=="")
{

   gerror.innerHTML="<span style='color:red;''>"+" field should be selected *</span>";
  return false;


}else
{

gerror.innerHTML="";  
}

//email


var email=document.forms["form"]["email"].value;

if(email=="")
{

   error.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else
if(!((email.indexOf(".") > 0) && (email.indexOf("@") > 0)) ||/[^a-zA-Z0-9.@_-]/.test(email))
{
error.innerHTML="<span style='color:red;''>"+" Invalid email.*</span>";

return false;
}else if(email.slice(-3)!="com" && email.slice(-5)!="ac.za" && email.slice(-6)!="gov.za" && email.slice(-3)!="org" && email.slice(-5)!="co.za")
{
  error.innerHTML="<span style='color:red;''>"+" Invalid email.*</span>";

return false;
}
else
{
error.innerHTML="";
}

//cellno
var cellno=document.forms["form"]["cellno"].value;

if(cellno=="")
{

   cerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
if(cellno.substring(0,3)!='071'&& cellno.substring(0,3)!='072'&&
   cellno.substring(0,3)!='073'&& cellno.substring(0,3)!='074'&&
   cellno.substring(0,3)!='076'&& cellno.substring(0,3)!='060'&&
   cellno.substring(0,3)!='061'&& cellno.substring(0,3)!='062'&&
   cellno.substring(0,3)!='063'&& cellno.substring(0,3)!='064'&&
   cellno.substring(0,3)!='065'&& cellno.substring(0,3)!='066'&&
   cellno.substring(0,3)!='067'&& cellno.substring(0,3)!='068'&&
   cellno.substring(0,3)!='081'&& cellno.substring(0,3)!='082'&&
   cellno.substring(0,3)!='010'&& cellno.substring(0,3)!='011'&&
   cellno.substring(0,3)!='012'&& cellno.substring(0,3)!='013'&&
   cellno.substring(0,3)!='014'&& cellno.substring(0,3)!='015'&&
   cellno.substring(0,3)!='016'&& cellno.substring(0,3)!='017'&&
   cellno.substring(0,3)!='018'&& cellno.substring(0,3)!='021'&&
   cellno.substring(0,3)!='022'&& cellno.substring(0,3)!='023'&&
   cellno.substring(0,3)!='027'&& cellno.substring(0,3)!='028'&&
   cellno.substring(0,3)!='031'&& cellno.substring(0,3)!='032'&&
   cellno.substring(0,3)!='033'&& cellno.substring(0,3)!='034'&&
   cellno.substring(0,3)!='035'&& cellno.substring(0,3)!='036'&&
   cellno.substring(0,3)!='039'&& cellno.substring(0,3)!='040'&&
   cellno.substring(0,3)!='041'&& cellno.substring(0,3)!='042'&&
   cellno.substring(0,3)!='043'&& cellno.substring(0,3)!='044'&&
   cellno.substring(0,3)!='045'&& cellno.substring(0,3)!='046'&&
   cellno.substring(0,3)!='047'&& cellno.substring(0,3)!='048'&&
   cellno.substring(0,3)!='049'&& cellno.substring(0,3)!='051'&&
   cellno.substring(0,3)!='053'&& cellno.substring(0,3)!='054'&&
   cellno.substring(0,3)!='056'&& cellno.substring(0,3)!='057'&&
   cellno.substring(0,3)!='058'&& 
   cellno.substring(0,3)!='083'&& cellno.substring(0,3)!='084')
   {

 cerror.innerHTML="<span style='color:red;''>"+" Surfix of phone number invalid. *</span>"
    return false;
   
}
else if(cellno.substring(0,1)!="0")
{


cerror.innerHTML="<span style='color:red;''>"+" cellno number must start with 0.*</span>";
return false;
}
else
if(!cellno.match(/^[0-9]+$/))
{

cerror.innerHTML="<span style='color:red;''>"+"field should be filled with number only.*</span>";
return false;   
}
else
if(cellno.toString().length!=10)
{
cerror.innerHTML="<span style='color:red;''>"+"field should be 10 characters.*</span>";    

return false;   
}
else
{
cerror.innerHTML="";

}


//standno

var standno=document.forms["form"]["standno"].value;


if(standno=="")
{

    standerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else if(!standno.match(/^[0-9]+$/))
{
    standerror.innerHTML="<span style='color:red;''>"+" field should contain numbers only.*</span>";
return false;

}else
{

    standerror.innerHTML="";  
}

//streetname
var streetname=document.forms["form"]["streetname"].value;


if(streetname=="")
{

    streeterror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else if(!streetname.match(/[a-zA-Z ][a-zA-Z ]+[a-zA-Z ]$/))    
{
    streeterror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

    streeterror.innerHTML="";  
}

//surbub

var suburb=document.forms["form"]["suburb"].value;


if(suburb=="")
{

    suberror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else if(!suburb.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z ]$/))
{
    suberror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

    suberror.innerHTML="";  
}

//city


var city=document.forms["form"]["city"].value;


if(city=="")
{

    cityerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else if(!city.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z ]$/))
{
    cityerror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

    cityerror.innerHTML="";  
}
//province

var province=document.forms["form"]["province"].value;


if(province=="")
{

   proverror.innerHTML="<span style='color:red;''>"+" field should be selected *</span>";
  return false;


}else
{

    proverror.innerHTML="";  
}
//account type

var accounttype=document.forms["form"]["accounttype"].value;


if(accounttype=="")
{

    accounttypeerror.innerHTML="<span style='color:red;''>"+"account type field should be selected *</span>";
  return false;


}else
{

    accounttypeerror.innerHTML="";  
}

//
var passd=document.forms["form"]["pwd"].value;
var cpassd=document.forms["form"]["cpwd"].value;




var cerrormessage=document.getElementById("cerrorpass");
var pass=document.getElementById("pwd").value;

if(pass=="")
{

   errormessage.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}else
{
errormessage.innerHTML="";
}
//contain atleast 1 lowercase

if(!pass.match(/^(?=.*[a-z])/))
{
  errormessage.innerHTML="<span style='color:red;''>"+" Password should contain atleast 1 lowercase alphabetical character.*</span>";
return false;
}
else
{
errormessage.innerHTML="";
}
//contain atleast 1 uppercase
if(!pass.match(/^(?=.*[A-Z])/))
{
  errormessage.innerHTML="<span style='color:red;''>"+" Password should contain atleast 1 uppercase alphabetical character.*</span>";
return false;
}
else
{
errormessage.innerHTML="";
}
//contain atleast 1 numeric
if(!pass.match(/^(?=.*[0-9])/))
{
  errormessage.innerHTML="<span style='color:red;''>"+" Password should contain atleast 1 numeric character.*</span>"
return false;
}
else
{
errormessage.innerHTML="";
}
//contain special character
if(!pass.match(/^(?=.*[!@#\$%\^&\*])/))
{
  errormessage.innerHTML="<span style='color:red;''>"+" Password should contain special character.*</span>";
return false;
}
else
{
errormessage.innerHTML="";
}
//contain 8 or more characters
if(!pass.match(/^(?=.{8,})/))
{
  errormessage.innerHTML="<span style='color:red;''>"+" Password shouldcontain 8 or more characters.*</span>";
return false;
}
else
{
errormessage.innerHTML="";
}
//confirm password
//step 1
if(cpassd==""){

cerrormessage.innerHTML="<span style='color:red;''>"+" confirm Password.*</span>";
return false;   
}else
{

cerrormessage.innerHTML="";
}




if(cpassd!=passd){

errormessage.innerHTML="<span style='color:red;''>"+" Password doesnt match.*</span>"
cerrormessage.innerHTML="<span style='color:red;''>"+" Password doesnt match.*</span>"
return false;   
}else
{
errormessage.innerHTML=""
cerrormessage.innerHTML=""
}
}
}
</script>
<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md fixed-top shadow navigation-clean" style="background-color: rgb(237,14,0);color: rgb(255,255,255);opacity: 0.80;">
            <div class="container"><a class="navbar-brand" href="index.php" style="font-family: Asap, sans-serif;font-weight: normal;">SAYFT&nbsp;<i class="fa fa-calendar"></i>&nbsp;</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1" style="font-size: 17px;font-family: 'Advent Pro', sans-serif;">
                    <ul class="nav navbar-nav ml-auto" style="color: rgb(255,255,255);">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="profileDash.php" style="color: rgb(255,255,255);font-weight: normal;font-family: Asap, sans-serif;">&nbsp;Back&nbsp;</a></li>
                        
                    </ul>
            </div> 
    </div>
    </nav>
    </div>
    <div class="row login-form">
        <div class="col-md-4 offset-md-4" style="padding-top: 131px;">
            <h2 class="text-center shadow-sm form-heading" style="font-family: Asap, sans-serif;font-weight: normal;color: rgb(240,62,51);">Update Client Information&nbsp;<i class="fa fa-pencil"></i></h2>
            <form class="text-white border-white shadow custom-form" action="" name="form" onsubmit="return validateForm();"  method="post">
                <div class="col">
                    <h1 style="font-size: 16px;font-family: Asap, sans-serif;color: rgb(240,62,51);font-style: italic;">Personal Details Form (Client)</h1>
                </div>
                <hr style="background-color: #f03e33;">
                <div class="form-group"><input class="form-control" type="text" id="name" value="<?php echo $data['name']?>" name="name" placeholder="Firstname" style="font-family: Asap, sans-serif;"><span id="nerror"></span></div>
                <div class="form-group"><input class="form-control" id="surname" type="text"  value="<?php echo $data['surname']?>" name="surname" placeholder="Lastname" style="font-family: Asap, sans-serif;"><span id="serror"></span></div>
                <div class="form-group"><input class="form-control" id="idno" type="text"  value="<?php echo $data['id_number']?>" name="idno" placeholder="id number" readonly="" style="font-family: Asap, sans-serif;"><span id="iderror"></span></div>
                <div class="form-group"><input class="form-control" id="gender" type="text"  value="<?php echo $data['gender']?>" name="gender" placeholder="gender" readonly="" style="font-family: Asap, sans-serif;"><span id="gerror"></span></div>
               
                <div
                    class="form-group"><input class="form-control" type="email" id="email"  value="<?php echo $data['email']?>" name="email" placeholder="Email" readonly="" style="font-family: Asap, sans-serif;"><span id="error"></span></div>
        <div class="form-group"><input class="form-control" type="text" name="cellno"  value="<?php echo $data['phone_number']?>" placeholder="Phone number" style="font-family: Asap, sans-serif;"><span id="cerror"></span></div>
        
        <div
            class="col">
            <h1 style="font-size: 16px;font-family: Asap, sans-serif;color: rgb(240,62,51);font-style: italic;">Account Type</h1>
            <hr style="background-color: #f03e33;">
    </div>
    <div class="form-group">
    <div class="form-group"><input class="form-control" type="text" name="accounttype" readonly=""  value="<?php echo $data['account_type']?>" placeholder="City" style="font-family: Asap, sans-serif;"></div>        

</div>
    
    
        <button class="btn btn-light btn-block btn-sm submit-button" name="update" type="submit" style="background-color: rgb(240,62,51);font-weight: normal;font-family: Asap, sans-serif;font-size: 16px;">Save Changes</button></form>
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