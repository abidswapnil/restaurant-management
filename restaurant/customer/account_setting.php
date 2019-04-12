<?php  
     
    error_reporting(0); 
    session_start(); 
    require'config.php';

    $name = $_SESSION['name'];
    $id = $_SESSION['cust_id'];

    if($name == '')
    {
      echo "<script>window.location.href='http://localhost/restaurant/customer/food/customer.php';</script>";
    }

  

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
	 <style type="text/css">
		.site-footer
	 	{
	 	    background-color: #e5e5e5;
	 	    color: #383838;
	 	    margin-top: 30px;
	 	    padding-top: 30px;		
	 	}
	 	.bottom-footer
	 	{
	 		border-top: 1px solid #918e8e;
	 		margin-top: 10px;
	 		padding-top: 10px;
	 		color: #918e8e;
	 	}
	 	.footer-nav
	 	{
	 		text-align: right;
	 		list-style: none;
	 	}
	 	.footer-nav li
	 	{
	 		display: inline;
	 		padding: 0px 10px;
	 	}
	 	.footer-nav li:not(:first-child):before
	 	{
	 		content: '|';
	 		padding: 0px 10px;

	 	}
	</style>
		<nav class="navbar navbar-dark bg-warning navbar-expand-sm" style="min-height:70px;">
			<div class="navbar navbar-brand" style="font-size: 30px;">Mr. Cheese</div>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="	navbar-nav ml-auto">
			   <li class="nav-item float-left">				
				 <a href="http://localhost/restaurant/customer/food/home_test.php" class="nav-link active font-weight-bold text-danger"><?php echo "".$name; ?></a>
			   </li>
			   <li class="nav-item">				
				 <a href="http://localhost/restaurant/customer/navbar/about.php" class="nav-link text-white">About</a>
			   </li>
			   <li class="nav-item dropdown">
			     <a href="" class="nav-link dropdown-toggle text-white" data-toggle="dropdown">Catering & events</a>
			     <div class="dropdown-menu">
			     	<a href="http://localhost/restaurant/customer/events.php" class="dropdown-item">Events</a>
			     	<div class="dropdown-divider"></div>
			     	<a href="http://localhost/restaurant/customer/my_events.php" class="dropdown-item">My events</a>
			     	<div class="dropdown-divider"></div>
			     	<a href="http://localhost/restaurant/customer/creat_event.php" class="dropdown-item">Creat events</a>
			     </div>
			   </li>
			   <li class="nav-item">				
				 <a href="http://localhost/restaurant/customer/reservation.php" class="nav-link text-white">Reservation</a>
			   </li>
			   <li class="nav-item">				
				 <a href="" class="nav-link text-white">Gallery</a>
			   </li>
			   <li class="nav-item dropdown">
			     <a href="" class="nav-link dropdown-toggle text-white" data-toggle="dropdown">Settings</a>
			     <div class="dropdown-menu">
			     	<a href="http://localhost/restaurant/customer/account_setting.php" class="dropdown-item">Account</a>
			     	<div class="dropdown-divider"></div>
			     	<a href="http://localhost/restaurant/signout.php" class="dropdown-item">sign out</a>
			     </div>
			   </li>  		
			</ul>
		</div>
		</nav>
		<div class='container mt-4'>	
				<table class="table table-borderless ">
					<?php

					   $sql = "SELECT name,email,contact FROM customer WHERE customer.cust_id='$id'";
					   $result = $conn->query($sql);

					   if($result ->num_rows >0)
					   {
					   	 while($row = $result->fetch_assoc())
					   	 {
					   	 	$name = $row['name'];
					   	 	$email = $row['email'];
					   	 	$contact = $row['contact'];
					   	 }
					   }

					 ?>
					<tr>
						<legend>Account information</legend><hr>
					</tr>
						<tr class="row ml-3">
							<td>Name:</td>
							<td><?php echo $name; ?></td>
							
					</tr>
					<tr class="row ml-3">
						<td>Email:</td>
						<td><?php echo $email; ?></td>
						
					</tr>
					<tr class="row ml-3">
						<td>Contact:</td>
						<td><?php echo $contact; ?></td>
							
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

              	 if(isset($_POST['name'],$_POST['email'],$_POST['contact']))
              	 {
              	 	$name = $_POST['name'];
              	 	$email = $_POST['email'];
              	 	$contact = $_POST['contact'];

              	 	$sql = "UPDATE customer SET name='$name',email='$email',contact='$contact' WHERE customer.cust_id='$id'";
              	 	$conn->query($sql);

              	 	echo "<script>window.location.href='http://localhost/restaurant/customer/account_setting.php';</script>";
              	 }


              	?>
              <form action="" method="POST">
            <label>Name:</label>
            <input type="text" name="name"  class="form-control" required="" value="<?php echo $name; ?>"><br>
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required="" value="<?php echo $email; ?>"><br>
            <label>Contact:</label>
            <input type="number" name="contact" class="form-control" required="" value="<?php echo $contact; ?>">
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

					   	  	 $sql = "SELECT password FROM customer WHERE cust_id='$id' AND password = '$password'";
					   	  	 $result = $conn->query($sql);

					   	  	 if($result ->num_rows >0)
					   	  	 {
					   	  	 	echo "<div class='alert alert-danger'>*entered old password. <strong>Not changed</strong></div>";
					   	  	 }
					   	  	 else
					   	  	 {
					   	  	 	$sql = "UPDATE customer SET customer.password ='$password' WHERE customer.cust_id='$id'";
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
				   	   <button class="btn btn-success">Change</button>
				   	</td>
				   </tr>
				 </form>
				</table>
		
		</div>
		<footer class="site-footer h-25">
    	<div class="container">
    		<div class="row">
    			
    		</div>
    		<div class="bottom-footer">

    			<div class="col-md-5">
    				<h4 class="text-warning">Mr. Cheese</h4>
    				© Copyright All right reserved 2019.
    				<div class="font-weight-bold">website credit: @abid swapnil</div>
    				<address>
    					Beside khan bahadur ahsanullah hall gate, Khulna university
    				</address>

    			</div>
    			<div class="col-md-7">
    				<ul class="footer-nav">
    					<li><a href="">Home</a></li>
    					<li><a href="">Blog</a></li>
    					<li><a href="">Contact</a></li>
    				</ul>
    			</div>
    			
    		</div>
    	</div>
    	
    	
    </footer>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="bootstrap.min.js"></script>



</body>
</html>