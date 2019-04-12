<?php
      error_reporting(0);
      require'config.php';
      session_start();
      $admin = $_SESSION['name']; 
	  /*$sql = "SELECT count(q_id) AS total FROM question";
	  $result = mysqli_query($conn,$sql);
	  $values = mysqli_fetch_assoc($result);
	  $num_rows= $values['total'];*/

    if($admin == '')
    {
      echo "<script>window.location.href='http://localhost/restaurant/customer/food/customer.php';</script>";
    }

  $sql="SELECT count(table_id) AS total FROM tables WHERE tables.reserve_status='1'";
  $result = mysqli_query($conn,$sql);
  $values = mysqli_fetch_assoc($result);
  $reservation= $values['total'];
  //echo $num_rows;
  
  $sql="SELECT count(order_id) AS total FROM orders";
  $result = mysqli_query($conn,$sql);
  $values = mysqli_fetch_assoc($result);
  $order= $values['total'];
	  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

	  <meta charset="utf-8">
	  <meta name="viewport" content="width-device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compitable" content="ie=edge">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title></title>
</head>
<body>

	<nav class="navbar bg-dark navbar-expand-md">
      <a href="" class="navbar-brand text-white">Admin | <?php echo $admin; ?></a>       
    </nav>
    <nav class="navbar navbar-dark bg-warning navbar-expand-md" style="min-height:70px;">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class=" navbar-nav ml-auto">
         <li class="nav-item">        
         <a href="http://localhost/restaurant/admin/admin.php" class="nav-link text-white">Profile</a>
         </li>
         <li class="nav-item">
           <a href="http://localhost/restaurant/admin/customers.php" class="nav-link text-white">Customers</a>
         </li>
         <li class="nav-item dropdown">
           <a href="" class="nav-link dropdown-toggle text-white" data-toggle="dropdown">Products</a>
           <div class="dropdown-menu">
            <a href="http://localhost/restaurant/customer/food/product.php" class="dropdown-item">All products</a>
             <a href="http://localhost/restaurant/customer/category.php" class="dropdown-item">Add products</a>
           </div>
         </li>
         <li class="nav-item">
           <a href="http://localhost/restaurant/admin/reservation.php" class="nav-link text-white">Reservations<span class="badge badge-success align-top ml-1"><?php if($reservation == 0){}else{ echo $reservation;} ?></span></a>
         </li>
         <li class="nav-item">
           <a href="http://localhost/restaurant/customer/food/orderad.php" class="nav-link text-white">Orders<span class="badge badge-success align-top ml-1"><?php if($order == 0){}else{ echo $order;} ?></span></a>
         </li>
         <li class="nav-item">
           <a href="http://localhost/restaurant/admin/news/question.php" class="nav-link text-white">FAQ<span class="badge badge-success align-top ml-1"></span></a>
         </li>
         <li class="nav-item dropdown">
           <a href="" class="nav-link dropdown-toggle text-white" data-toggle="dropdown">Settings</a>
           <div class="dropdown-menu">
            <a href="http://localhost/restaurant/admin/account_settings.php" class="dropdown-item">Account</a>
            <a href="http://localhost/restaurant/signout.php" class="dropdown-item">sign out</a>
           </div>
         </li>
            
      </ul>
    </div>
    </nav>

	<div class="container">

	
		<div style="margin-top: 50px;">
			<h1 class="">Questions</h1>
			<div class=" mt-3 " style="width: 100%;">
				<?php 

				   $sql = "SELECT * FROM question";
				   $result = $conn->query($sql);

				   if($result->num_rows >0)
				   {
				   	 while($row = $result->fetch_assoc())
				   	 {
				   	 	$id = $row['q_id'];
				   	 	$q = $row['question'];
				   	 	$name = $row['name'];
				   	 	$time = $row['time'];
              $email = $row['email'];

				   	 	echo "<ul class='list-group'>
				   	 	         <li class='list-group-item list-group-item-action mt-1 shadow-sm p-4 mb-3 bg-white rounded'>
				   	 	           <h4 class='text-dark d-flex'>Question - $id </h4>
				   	 	           <small class='pb-3 mr-3 font-italic'> $time </small>
				   	 	           <p class='pt-4 text-justify' style='font-size:16px;'> $q </p><hr>
				   	 	           <small>By <p class='font-weight-bold d-inline'><a href='#' class='text-dark'>$name</a><a href='' class='float-right'>$email</a></p></small>
				   	 	         </li>
				   	 	      </ul>";
				   	 }

				   }
				   


				 ?>
			</div>
		</div>
		<div style="margin-top:50px;"></div>
	</div>
	<script type="text/javascript">

	var close = document.getElementsByClassName("closebtn");
    var i;

    for (i = 0; i < close.length; i++) 
    {
    
	    close[i].onclick = function(){

	    var div = this.parentElement;

	    div.style.opacity = "0";
	    setTimeout(function(){ div.style.display = "none"; }, 600);
	    }
    }

</script>






    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	  <script src="bootstrap.min.js"></script>
</body>
</html>