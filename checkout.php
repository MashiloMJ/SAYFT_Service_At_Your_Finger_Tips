<?php

$conn = mysqli_connect("localhost","root","","sayft");
if(!isset($_SESSION)) 
      { 
          session_start(); 
          $id=$_SESSION['user_id'];
          $email=$_SESSION['email'];
          
          
      }


require 'item.php';

// Save new order

mysqli_query($conn, 'insert into booking(user_id,status)
values("'.$id.'", 0)');
$booking_id = mysqli_insert_id($conn);

// Save order details for new order
$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
for($i=0; $i<count($cart); $i++) {


mysqli_query($conn, 'insert into booking_details(user_id,booking_id,service_id, qty, price)
values('.$id.','.$booking_id.','.$cart[$i]->service_id.','.$cart[$i]->quantity.','.$cart[$i]->price.')');


}


?>