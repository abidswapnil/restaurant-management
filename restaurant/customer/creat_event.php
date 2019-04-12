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
<html lang="en">
<head>

	  <meta charset="utf-8">
	  <meta name="viewport" content="width-device-width, initial-scale=1.0">
	  <meta http-equiv="X-UA-Compitable" content="ie=edge">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title></title>
</head>
<body>
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
	<div>
		<div class="container mt-3">
			<?php
			   if (isset($_POST['event'],$_POST['location'],$_POST['strt'],$_POST['end'],$_POST['about'])) {
			   	    
			   	    $event = $_POST["event"];
			   	    $location = $_POST["location"];
			   	    $strt = $_POST['strt'];
			   	    $end = $_POST['end'];
			   	    $about = $_POST['about'];

			   	    $sql = "INSERT INTO events (event_name,location,start_time,end_time,creator,about,cust_id) VALUES ('$event','$location','$strt',$end,'$name','$about','$id')";

			   	    if($conn->query($sql) == TRUE)
			   	    {
			   	    	echo "<div class='alert alert-success text-center'>Event successfuly created!</div>";
			   	    }
			   	    else
			   	    {
			   	    	echo "string";
			   	    }

			   }


			?>
			<legend class="">Creat your events</legend><hr>
			 <form action="" method="POST">
			 	<div class="form-group">
			 	    <label>Name your event -</label>
			 	    <input type="text" name="event" placeholder="event name" class="form-control" required="">
			 	</div>
			 	<div class="form-group">
			 	    <label>Location -</label>
			 	    <input type="text" name="location" placeholder="event location" class="form-control" required="">
			 	</div>
			 	<div class="form-group">
			 	    <label>Start time -</label>
			 	    <input type="datetime-local" name="strt" class="form-control" required="">
			 	</div>
			 	<div class="form-group">
			 	    <label>End time -</label>
			 	    <input type="time" name="end" class="form-control" required="">
			 	</div>
			 	<div class="form-group">
			 	    <label>About event -</label>
			 	    <textarea name="about" placeholder="about your event" class="form-control" rows="5" required=""></textarea>
			 	    <smallc class='text-muted'>Keep it short.</small>
			 		
			 	</div>
			 	<button class="btn btn-info">Creat event</button>
			 </form>
			
		
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

		
		<!--<div class="text-center"><a href="http://localhost/restaurant/user/navbar/user_question.php">question us</a></div>-->
			
		
	</div>
	


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	  <script src="bootstrap.min.js"></script>
</body>
</html>