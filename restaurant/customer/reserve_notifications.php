<?php  
    
    error_reporting(0); 
    session_start(); 
    require'config.php';

    $name = $_SESSION['name'];
    $id = $_SESSION['cust_id'];
    $email = $_SESSION['email'];
    	
    $sql = "SELECT count(notification_id) AS total FROM notifications WHERE notifications.cust_id='$id";
    $result = mysqli_query($conn,$sql);
    $values = mysqli_fetch_assoc($result);
    $num_notifi= $values['total'];

    echo $num_notifi;

    $_SESSION['total'] = $num_notifi;
    echo $_SESSION['total'];

    #echo $num;

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
			<?php 

			   $sql = "SELECT * FROM notifications WHERE notifications.cust_id='$id'";
			   $result = $conn->query($sql);
			   if($result->num_rows > 0)
			   {
			   	 while($row = $result->fetch_assoc())
			   	 {
			   	 	$notification_id = $row['notification_id'];
			   	 	$table_id = $row['notification'];
			   	 	$status = $row['reserve_status'];
			   	 	$purpose = $row['purpose'];
			   	 	$meal = $row['meal_plan'];

			   	 	if($status == 0)
			   	 	{
			   	 		echo "<div class='alert alert-danger mt-2'><span class='badge badge-warning badge-pill'>$notification_id</span> Your reservation for <strong>$purpose</strong> with $meal is canceled. <span class='badge badge-info badge-pill'>table $table_id</span><button type='button' class='close' data-dismiss='alert' aria-label='close'>
                        <span aria-hidden='true'>&times;</span></div>";
			   	 	}
			   	 	elseif($status == 1)
			   	 	{
			   	 		echo "<div class='alert alert-success mt-2'><span class='badge badge-warning badge-pill'>$notification_id</span> Your reservation for <strong>$purpose</strong> with $meal is accepted. <span class='badge badge-info badge-pill'>table $table_id</span><button type='button' class='close' data-dismiss='alert' aria-label='close'>
                        <span aria-hidden='true'>&times;</span></div>";
			   	 	}
			   	 }
			   }




			 ?>

			
		</div>
		
		
        
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="bootstrap.min.js"></script>
    
</body>
</html>