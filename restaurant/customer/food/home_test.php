<?php  
    
    error_reporting(0); 
    session_start(); 
    //ini_set('error_reporting()', newvalue)
    require'config.php';

    $name = $_SESSION['name'];
    $cust_id = $_SESSION['cust_id'];

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
		<div class="text-center text-justify mt-4">
			<p><font face="Comic Sans MS">We accept delivery and pick-up orders via Caviar and Uber Eats. We offer our fresh fried chicken from Hill Country Chicken and Central-Texas style smoked meats from Hill Country Barbecue Market. Chech <a href="http://localhost/restaurant/customer/food/menu/menu.jpg">menu card</a> here.</font></p>
		</div>
		
		<div>

	    <form action="" method="POST" enctype="multipart/form-data" class="form-group">				
		<h4 class="text-success">Our Food</h4>
		<?php 

		  $sql = "SELECT count(q_id) AS total FROM question";
		  $result = mysqli_query($conn,$sql);
		  $values = mysqli_fetch_assoc($result);
		  $rows= $values['total'];



		  $sql = "SELECT * FROM food ORDER BY cat_id";
		  $result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			$i = 0;

		    echo "<table class='table'><tr class='row'>";
		    while($row = $result->fetch_assoc()) 
		    {
		    	$i++;

                $id[$i] = $row['food_id'];
		    	$food[$i] = $row['food_name'];
		    	$pieces[$i] = $row['pieces'];
		    	$image[$i] = $row['image'];
		    	$category[$i] = $row['category'];
		    	$price[$i] = $row['food_price'];

		    	if($pieces[$i] > 20)
		    	{
		    		echo"<div id='food'><td><div class='text-center bg-warning text-danger p-1 rounded' style='font-size:25px;'>$category[$i]</div>
				   	   <img src=$image[$i] class='img-thumbnail' style='height:200px; width: 300px;' data-toggle='toolpit' data-placement='right' title='$food[$i]'>
				   	   <div class='text-center p-3 text-danger shadow p-3 mb-5 bg-light rounded text-justify'><div class='text-center'><span class='badge badge-success'>Available</span></div><font face='Comic Sans MS' style='font-size:25px;'>$food[$i]</font><div style='font-size:20px;'>$price[$i] BDT</div><input type='submit' class='btn btn-info' name='add".$i."' value='Order now'></div>
				   	   </td></div>";

		    	}
		    	elseif($pieces[$i] <= 20)
		    	{
		    		echo"<div id='food'><td><div class='text-center bg-warning text-danger p-1 rounded' style='font-size:25px;'>$category[$i]</div>
				   	   <img src=$image[$i] class='img-thumbnail' style='height:200px; width: 300px;' data-toggle='toolpit' data-placement='right' title='$food[$i]'>
				   	   <div class='text-center p-3 text-danger shadow p-3 mb-5 bg-light rounded text-justify'><div class='text-center'><span class='badge badge-danger'>Stock out</span></div><font face='Comic Sans MS' style='font-size:25px;'>$food[$i]</font><div style='font-size:20px;'>$price[$i] BDT</div><input type='submit' class='btn btn-info' name='add".$i."' value='Order now'></div>
				   	   </td></div>";
		    	}
    	
   	    	   
	    	
		    }

		    $num_food =$i;

		} 
		for ($i=1; $i <= $num_food ; $i++) { 

			$add_btn = 'add'.$i;

			if(isset($_POST[$add_btn])){

				$selected_id = $id[$i];
				$_SESSION['id'] = $selected_id;

				$sql = "SELECT food.pieces FROM food WHERE food.food_id = $selected_id";
				$result = $conn->query($sql);

				if($result ->num_rows >0)
				{
					while($row = $result->fetch_assoc())
					{
						$pieces = $row['pieces'];
						$_SESSION['pieces'] = $pieces;
						if($pieces <= 20)
						{
							echo "<div class='text-danger font-weight-bold'>Out of stock!</div>";
						}
						elseif($pieces > 20)
					    {
					    	#$_SESSION['id'] = $selected_id;
					    	#echo $_SESSION['id'];
					    	echo "<script>window.location.href='http://localhost/restaurant/customer/food/customer_order.php';</script>";

					    }
						    

					}
			    }
			}
		}
			
		
		$conn->close();

		echo "</tr></table>";

		 ?>
		</div>
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


	</form>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="bootstrap.min.js"></script>
    
</body>
</html>