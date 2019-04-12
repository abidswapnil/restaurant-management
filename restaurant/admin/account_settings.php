<?php
  
  error_reporting(0);
  require 'config.php';
  session_start();
  $admin = $_SESSION['name']; 

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

  $sql = "SELECT count(q_id) AS total FROM question";
  $result = mysqli_query($conn,$sql);
  $values = mysqli_fetch_assoc($result);
  $faq= $values['total'];

?> 
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body class="bg-light">

	 <meta charset="utf-8">
	 <meta name="viewport" content="width-device-width, initial-scale=1.0">
	 <meta http-equiv="X-UA-Compitable" content="ie=edge">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <nav class="navbar bg-dark navbar-expand-md">
      <a href="" class="navbar-brand text-white">Admin | <?php echo $admin; ?></a>       
        <ul class="navbar-nav">
        </ul>
    </nav>
    <nav class="navbar navbar-dark bg-warning navbar-expand-sm" style="min-height:70px;">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class=" navbar-nav ml-auto">
         <li class="nav-item">        
         <a href="http://localhost/restaurant/admin/admin.php" class="nav-link text-white">Profile</a>
         </li>
         <li class="nav-item">
           <a href="" class="nav-link text-white">Customers</a>
         </li>
         <li class="nav-item dropdown">
           <a href="" class="nav-link dropdown-toggle text-white" data-toggle="dropdown">Products</a>
           <div class="dropdown-menu">
            <a href="http://localhost/restaurant/customer/food/product.php" class="dropdown-item">All products</a>
            <div class="dropdown-divider"></div>
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
           <a href="http://localhost/restaurant/admin/news/question.php" class="nav-link text-white">FAQ<span class="badge badge-success align-top ml-1"><?php if($faq == 0){}else{ echo $faq;} ?></span></a>
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
		<div class='container mt-4'>	
				<table class="table table-borderless ">
					<?php

					   $sql = "SELECT name,email,gender,phone,about FROM admin";
					   $result = $conn->query($sql);

					   if($result ->num_rows >0)
					   {
					   	 while($row = $result->fetch_assoc())
					   	 {
					   	 	$name = $row['name'];
					   	 	$email = $row['email'];
					   	 	$gender = $row['gender'];
					   	 	$phone = $row['phone'];
					   	 	$about = $row['about'];
					   	 }
					   }

					 ?>
					<tr>
						<legend>Account information</legend><hr>
					</tr>
					<form action="" method="">
						<tr class="row ml-3">
							<td>Name:</td>
							<td><?php echo $name; ?></td>
							
						</tr>
					</form>
					<tr class="row ml-3">
						<td>Email:</td>
						<td><?php echo $email; ?></td>
						
					</tr>
					<tr class="row ml-3">
						<td>Gender:</td>
						<td><?php echo $gender; ?></td>
							
					</tr>
					<tr class="row ml-3">
						<td>Phone:</td>
						<td><?php echo $phone; ?></td>
							
					</tr>
					<tr class="row ml-3">
						<td>About:</td>
						<td><?php echo $about; ?></td>
							
					</tr>
				</table>

				<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModalScrollable">
		          <i class="fa fa-edit"></i> Edit
		        </button>
		        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
		          <div class="modal-dialog modal-dialog-scrollable" role="document">
		            <div class="modal-content">
		              <div class="modal-header bg-warning">
		                <h5 class="modal-title" id="exampleModalScrollableTitle">Account settings <i class="fa fa-cog"></i></h5>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                  <span aria-hidden="true">&times;</span>
		                </button>
		              </div>
		              <div class="modal-body">
		              	<?php 

		              	 if(isset($_POST['name'],$_POST['email'],$_POST['gender'],$_POST['phone'],$_POST['about']))
		              	 {
		              	 	$name = $_POST['name'];
		              	 	$email = $_POST['email'];
		              	 	$gender = $_POST['gender'];
		              	 	$phone = $_POST['phone'];
		              	 	$about = $_POST['about'];

		              	 	$sql = "UPDATE admin SET name='$name',email='$email',gender='$gender',phone='$phone',about='$about'";
		              	 	$conn->query($sql);

		              	 	echo "<script>window.location.href='http://localhost/restaurant/admin/account_settings.php';</script>";
		              	 }


		              	?>
		              <form action="" method="POST">
		            <label>Name:</label>
		            <input type="text" name="name"  class="form-control" required="" value="<?php echo $name; ?>"><br>
		            <label>Email:</label>
		            <input type="email" name="email" class="form-control" required="" value="<?php echo $email; ?>"><br>
		            <label>Gender:</label>
		            <select name="gender" class="form-control">
		            	<option class="select-item">male</option>
		            	<option class="select-item">female</option>
		            </select><br>	
		            <label>Contact:</label>
		            <input type="number" name="phone" class="form-control" required="" value="<?php echo $phone; ?>"><br>
		            <label>About:</label>
		            <textarea class="form-control" name="about"><?php echo $about ?></textarea>
		            </div>
		            <div class="modal-footer">
		              <button class="btn btn-danger" data-dismiss="modal">Close</button>
		              <button class="btn btn-success">Save cahnges</button>
		            </div>
		            </form>
		            </div>
		          </div>
		        </div>
			
				<table class="table table-borderless ">
				  <form action="" method="POST">
				   <tr class="row">
					<legend>Password settings</legend>
					<?php 

					   if(isset($_POST['new'],$_POST['confirm']))
					   {
					   	  if($_POST['new'] == $_POST['confirm'])
					   	  {
					   	  	$password = $_POST['new'].md5($_POST['new']).sha1($_POST['new']);

					   	  	 $sql = "SELECT password FROM admin WHERE password = '$password'";
					   	  	 $result = $conn->query($sql);

					   	  	 if($result ->num_rows >0)
					   	  	 {
					   	  	 	echo "<div class='alert alert-danger'>*entered old password. <strong>Not changed</strong></div>";
					   	  	 }
					   	  	 else
					   	  	 {
					   	  	 	$sql = "UPDATE admin SET admin.password ='$password'";
						   	  	if($conn->query($sql) == TRUE)
						   	  	{
						   	  	  echo "<div class='alert alert-success'>password changed</div>";
						   	  	}

					   	  	 }

					   	  	 
					   	  	 
					   	  }
					   	  else
					   	  {
					   	  	echo "<div class='alert alert-danger'>*password miss-matched. <strong>try again</strong></div>";
					   	  }
					   }

					 ?>

					<hr>
					<small class="float-right text-muted">Change your password with a secure one.</small>
				   </tr>
				   <tr class="row ml-3">
				   	<td><label> New password:</label></td>
				   	<td class=""><input type="password" name="new" placeholder="creat password" class="form-control" required=""></td>
				   </tr>
				   <tr class="row ml-3">
				   	<td><label>Confirm password:</label></td>
				   	<td><input type="password" name="confirm" placeholder="re-type password" class="form-control" required=""></td>
				   </tr>
				   <tr class="row ml-3">
				   	<td>
				   	   <button class="btn btn-success">save change</button>
				   	</td>
				   </tr>
				 </form>
				</table>
		
		</div>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="bootstrap.min.js"></script>



</body>
</html>