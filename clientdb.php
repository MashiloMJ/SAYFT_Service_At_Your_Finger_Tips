<!DOCTYPE html>
<html>
<?php


$conn=mysqli_connect("localhost","root","","sayft");

//$id=$_GET['edt'];

//session_start();


 if(!isset($_SESSION)) 
    { 
        session_start(); 
        $email=$_SESSION['email'];
    }
   
$qry2=mysqli_query($conn,"select * from user WHERE email='$email'and account_type='Admin'");
$data2=mysqli_fetch_array($qry2);




//$data=mysqli_fetch_array($qry);

?>
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
    <link rel="stylesheet" href="assets/css/dh-highlight-left-right.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Login-Form.css">
    <link rel="stylesheet" href="assets/css/login-full-page-bs4.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Swipe-Slider-9.css">

    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/MUSA_no-more-tables-1.css">
    <link rel="stylesheet" href="assets/css/MUSA_no-more-tables.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="font-family: 'Advent Pro', sans-serif;">
    <div>
        <nav class="navbar navbar-light navbar-expand-md shadow navigation-clean" style="background-color: rgb(237,14,0);color: rgb(255,255,255);opacity: 0.80;padding-top: 16px;">
            <div class="container"><a class="navbar-brand" href="index.html" style="font-family: Asap, sans-serif;font-weight: normal;">&nbsp;<i class="fa fa-dashboard"></i>&nbsp;</a><a class="navbar-brand" href="#" style="font-family: Asap, sans-serif;font-weight: normal;">Logged In as <i class="fa fa-user"></i>&nbsp;<?php echo($data2['surname']." ".$data2['name']) ?>&nbsp;</a>
                <button
                    data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1" style="font-size: 17px;font-family: 'Advent Pro', sans-serif;">
                        <ul class="nav navbar-nav ml-auto" style="color: rgb(255,255,255);"></ul>
                    </div>
                    <ul class="nav navbar-nav flex-grow-1 justify-content-between">
                        <li class="nav-item" role="presentation"><a class="nav-link active border rounded-0 border-white" href="#" style="color: rgb(255,255,255);font-family: Asap, sans-serif;">Clients Accounts</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link border rounded-0" href="servicedb.php" style="font-family: Asap, sans-serif;color: rgb(255,255,255);">Service Providers Accounts</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link border rounded-0" href="adminbookings.php" style="font-family: Asap, sans-serif;color: rgb(255,255,255);">Bookings</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="adminDash.php" style="color: rgb(255,255,255);font-family: Asap, sans-serif;"><i class="fa fa-sign-out" style="font-size: 23px;"></i></a></li>
                    
                    </ul>
            </div>
        </nav>
    </div>
    <div class="col" style="font-family: Asap, sans-serif;padding-top: 21px;">
        <h1 class="text-center" style="color: rgb(240,62,51);font-size: 26px;">Client Accounts</h1>
    </div>
    <hr style="background-color: #f03e33;">

    <?PHP
              
                
             

                  

              $query="SELECT user.user_id as id,user.surname as sur,user.name as nam,user.id_number as idno,user.age as age,user.gender as gen,user.email as em,user.phone_number as phon
              ,user.account_type as acc,location.stand_no as stan,location.street_name as snam,location.suburb as sub,location.city as cit,location.province as  pro
               from user ,location 
               where user.account_type='Client'
               and user.user_id=location.user_id";
              $result=mysqli_query($conn,$query);
              
            

              $rows=mysqli_num_rows($result);
         
              
             
              
              if ($rows>0) {
                


              
                ?>
    <div class="col" style="font-family: Asap, sans-serif;">
  

   
    <div class="table-responsive table mb-0 pt-3 pr-2" >   <button type="button" class="dt-button" href="javascript:void(0)" aria-controls="page-content" type="button"><span>Word</span></button>
            <table id="page-content" class="table table-striped table-sm my-0 mydatatable" style="font-size: 12px;">
                <thead style="background-color: #f03e33;color: rgb(255,255,255);font-weight: normal;font-style: normal;">
                    <tr>
                        <th style="font-weight: normal;">Account#</th>
                        <th style="font-weight: normal;">Surname</th>
                        <th style="font-weight: normal;">Name(s)</th>
                        <th style="font-weight: normal;">Id Number</th>
                        <th style="font-weight: normal;">Age</th>
                        <th style="font-weight: normal;">Gender</th>
                        <th style="font-weight: normal;">Email</th>
                        <th style="font-weight: normal;">Phone Number</th>
                        <th style="font-weight: normal;">Account Type</th>
                        <th style="font-weight: normal;">Stand No.</th>
                        <th style="font-weight: normal;">Street Name</th>
                        <th style="font-weight: normal;">Suburb</th>
                        <th style="font-weight: normal;">City</th>
                        <th style="font-weight: normal;">Province</th>
                        <th style="font-weight: normal;">Edit</th>
                        <th style="font-weight: normal;">Delete</th>
                    </tr>
                </thead>
             
                <tbody>   <?php
                    while ($rows=mysqli_fetch_array($result)) {

                        
                        $sur= $rows['sur'];
                        $nam= $rows['nam'];
                        $idno= $rows['idno'];
                        $age= $rows['age'];
                        $gen= $rows['gen'];
                        $em= $rows['em'];
                        $phon= $rows['phon'];
                        $acc= $rows['acc'];
                        $stan= $rows['stan'];
                        $snam= $rows['snam'];
                        $sub= $rows['sub'];
                        $cit= $rows['cit'];
                        $pro= $rows['pro'];
                    

                        $hint="
                        Profile Details Below:
                        Surname&nbsp;&nbsp;:&nbsp;$sur
                        Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;$nam
                        Id Number &nbsp;: &nbsp;$idno
                        Age &nbsp;:&nbsp;$age
                        Gender &nbsp;:&nbsp;$gen
                        Email &nbsp;:&nbsp;$em
                        Phone Number &nbsp;:&nbsp;$phon
                        Account Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;$acc
                        Stand no &nbsp;: &nbsp;$stan
                        Street name &nbsp;:&nbsp;$snam
                        Suburb &nbsp;:&nbsp;$sub
                        City &nbsp;:&nbsp;$cit
                        Province &nbsp;:&nbsp;$pro
                        
                        ";
                  ?>
                    <tr>
                    <td style="font-family: Asap, sans-serif;" title="<?php echo $hint;?>" ><?php echo $rows['id'];?></td>
                                            <td style="font-family: Asap, sans-serif;" title="<?php echo $hint;?>"><?php echo $rows['sur'];?></td>
                                            <td style="font-family: Asap, sans-serif;" title="<?php echo $hint;?>"><?php echo $rows['nam'];?></td>
                                            <td style="font-family: Asap, sans-serif;" title="<?php echo $hint;?>"><?php echo $rows['idno'];?></td>
                                            <td style="font-family: Asap, sans-serif;" title="<?php echo $hint;?>"><?php echo $rows['age'];?></td>
                                            <td style="font-family: Asap, sans-serif;" title="<?php echo $hint;?>"><?php echo $rows['gen'];?></td>
                                            <td style="font-family: Asap, sans-serif;" title="<?php echo $hint;?>"><?php echo $rows['em'];?></td>
                                           
                                            <td style="font-family: Asap, sans-serif;" title="<?php echo $hint;?>"><?php echo $rows['phon'];?></td>
                                            <td style="font-family: Asap, sans-serif;" title="<?php echo $hint;?>"><?php echo $rows['acc'];?></td>
                                            <td style="font-family: Asap, sans-serif;" title="<?php echo $hint;?>"><?php echo $rows['stan'];?></td>
                                            <td style="font-family: Asap, sans-serif;" title="<?php echo $hint;?>"><?php echo $rows['snam'];?></td>
                                            <td style="font-family: Asap, sans-serif;" title="<?php echo $hint;?>"><?php echo $rows['sub'];?></td>
                                            <td style="font-family: Asap, sans-serif;" title="<?php echo $hint;?>"><?php echo $rows['cit'];?></td>
                                            <td style="font-family: Asap, sans-serif;" title="<?php echo $hint;?>"><?php echo $rows['pro'];?></td>
                        <td><a href="adminUpdate.php?edt=<?php echo $rows['id'];?>" style="color: rgb(240,62,51);line-height: 24px;font-size: 24px;"><i class="fa fa-edit"></i></a></td>
                        <td><a href="adminDeleteClient.php?edt=<?php echo $rows['id'];?>"><i class="fa fa-trash" style="color: rgb(240,62,51);font-size: 24px;"></i></a></td>
                    </tr><?php
                  
                }
                ?>
                </tbody>
                
            </table>
            <?php
              }else{
                ?>
                <h3 style="color: rgb(240,62,51);font-size: 26px;text-align:center;">No record(s)</h3>
                <?php
              }
              
            
              ?>
        </div>
     
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="FileSaver.js"></script> 
<script src="jquery.wordexport.js"></script> 
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("button.dt-button").click(function(event) {
            $("#page-content").wordExport();
        });
    });
    </script>


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


</body>

</html>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>