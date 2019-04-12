<?php 

 session_start();

 if(isset($_SESSION['name']))
 {
 	session_destroy();
 	session_unset();

 	echo "<script>window.location.href='http://localhost/restaurant/customer/food/customer.php';</script>";
 }



 ?>