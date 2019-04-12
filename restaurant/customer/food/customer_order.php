<?php  
    
    error_reporting(0); 
    session_start(); 
    require'config.php';

    $name = $_SESSION['name'];
    $food_id = $_SESSION['id'];
    $cust_id = $_SESSION['cust_id'];

    if($name == '')
	{
	   echo "<script>window.location.href='http://localhost/restaurant/customer/food/customer.php';</script>";
	}

	$sql="SELECT count(order_id) AS total FROM orders WHERE orders.cust_id='$cust_id'";
	$result = mysqli_query($conn,$sql);
	$values = mysqli_fetch_assoc($result);
	$cart= $values['total'];


?>
<!DOCTYPE html>
<html>
<head>
	<title>customer-order</title>
	<meta charset="utf-8">
	 <meta name="viewport" content="width-device-width, initial-scale=1.0">
	 <meta http-equiv="X-UA-Compitable" content="ie=edge">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 
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
	
		<nav class="navbar navbar-dark bg-warning navbar-expand-md" style="min-height:70px;">
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
           <div class="container mt-1">
			<?php 

			   $id = $_SESSION['id'];

			   $sql = "SELECT * FROM food WHERE food.food_id = '$id'";
			   $result = $conn->query($sql);

			   if($result ->num_rows >0)
			   {
			   	  while($row = $result->fetch_assoc())
			   	  {
			   	  	$image = $row['image'];
			   	  	$food = $row['food_name'];
			   	  	$price = $row['food_price'];
			   	  	$category = $row['category'];
			   	  	$pieces = $row['pieces'];

			   	  	$max = $pieces - 10;
			   	  	 
			   	  }
			   }

			 ?>
			 <div class="row bg-light">
			    <img src= "<?php echo $image; ?>" class="img-thumbnail" style="height:200px; width: 300px;">
			    <h4 class="display-4 mx-auto text-warning">
			    	<?php echo $food; ?>
			    	<p class="mt-3 text-dark" style="font-size: 25px;">Price: <?php echo $price;?> BDT</p>
			    	<p class="mt-2 text-dark" style="font-size: 25px;">Item - category: <?php echo $category;?></p>

			    </h4>
			    
			</div><hr>
			
			 <div id="accordion" role="tablist" class="">
			 <div class="card">
				<div class="card-header" role="tab">
					<h5 class="mb-0">
						<a href="#cart" data-toggle="collapse" class=""><i class="fa fa-shopping-cart"></i> Cart</a><span class="badge badge-success align-top float-right" data-toggle="toolpit" data-placement="right" title="<?php echo $cart; ?> products"><?php echo $cart;?></span>
					</h5>
				</div>
				<div class="collapse" id="cart" data-parent="#accordion">
					<div class="card-body">
						<table class="table">
							<form action="" method="POST">
							
							<?php

							  $sql = "SELECT item,pieces,size FROM orders WHERE orders.cust_id='$cust_id'";
							  $result = $conn->query($sql);

							  if($result->num_rows >0)
							  {
							  	while($row=$result->fetch_assoc())
							  	{
							  		$item1 = $row['item'];
							  		$pieces1 = $row['pieces'];
							  		$size1 = $row['size'];
						    ?>
								<tr class="bg-light"><td>Item - <?php echo $item1 ;?></td>
								<td>Amount - <?php echo $pieces1;?></td>
								<td>Size - <?php echo $size1;?></td>
								<td><button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                  <span aria-hidden="true">&times;</span>
				                </button></td>
							    </tr>
							<?php
						         }
						      }
						      else
						      {
						      	echo "<p class='text-secondary text-center'>Cart empty!</p>";
						      }
						    ?>
							
	                     </form>
						</table>
					</div>
				</div>
			</div>
		</div>			
			<small class="text-muted float-right">@mr.cheesekhulna</small>
			<?php  

			  if(isset($_POST['piece'],$_POST['size'],$_POST['contact']))
			  {
			  	  $piece = $_POST['piece'];
			  	  $size = $_POST['size'];
			  	  $contact = $_POST['contact'];
			  	  $time = date('H:i:s');
          
			  	  $sql = "SELECT food.pieces FROM food WHERE food.food_id='$food_id'";
			  	  $result = $conn->query($sql);

			  	  if($result->num_rows >0)
			  	  {
			  	  	while($row=$result->fetch_assoc())
			  	  	{
			  	  		$pieces = $row['pieces'];
			  	  	}
			  	  	$new_amount = $pieces - $piece;
			  	  }

			  	  #echo $new_amount;

			  	  $sql = "INSERT INTO orders (item,pieces,time,size,contact,image,food_id,name,cust_id) VALUES ('$food','$piece','$time','$size','$contact','$image','$food_id','$name','$cust_id')";

			  	  $sql1 = "UPDATE food SET food.pieces='$new_amount' WHERE food.food_id='$food_id'";
			  	  $conn->query($sql);
			  	  $conn->query($sql1);

			  	  echo "<script>window.location.href='http://localhost/restaurant/customer/food/customer_order.php';</script>";
			  	  
			  	  
			  }

			?>
	           
				<form action="" method="POST" class="form-group"> 
					<input  type="text" name="food_name" placeholder="<?php echo $food; ?>" class="form-control mt-3"  disabled="" ><br>
					<input type="number" name="piece" placeholder="number of pieces you want to order" min="1" max="<?php echo $max;?>"class="form-control" required="">
					<small class="text-muted">You can not order more than <?php echo $max; ?> pieces.</small>
					<br><br>
					<select class="select-group form-control" name="size">
						<option class="select-item">large</option>
						<option class="select-item">medium</option>
						<option class="select-item">small</option>
						<option class="select-item">regular</option>
						<option class="select-item">none</option>
						
					</select><br>
					<input type="text" name="contact" value="+880-" class="form-control" required=""><br>
					<button class="btn btn-info ">Add to cart</button>
					<a href="" data-toggle="modal" data-target="#exampleModalScrollable" class="ml-2"><i class="fa fa-credit-card "></i> Online payment</a>
					</form>
				</div>
					<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			          <div class="modal-dialog modal-dialog-scrollable" role="document">
			            <div class="modal-content">
			              <div class="modal-header bg-warning">
			                <h5 class="modal-title" id="exampleModalScrollableTitle">Payment <i class="fa fa-credit-card"></i></h5>
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                 <span aria-hidden="true">&times;</span>
			                </button>
			              </div>
			              <div class="modal-body">
			              	<i class="fa fa-shopping-cart"></i>: <?php echo $cart;  ?>
			              <form action="" method="POST">
			              	<span class="badge badge-success">Credit or Debit Cards</span><br>
			              	<label>Name on card</label>
			              	<input type="text" name="card_name" class="form-control"><br>
			              	<label>Card number</label>
			              	<input type="number" name="card_number" class="form-control" placeholder="xxxx xxxx xxxx xxxx"><br>
			              	<label>Expiration date</label>
			              	<input type="date" name="expiration" class="form-control"><br>
			              	<button class="btn btn-primary float-right"><i class="fa fa-credit-card"></i> Add your card</button>
			              	
			              </form>
			              <form action="" method="POST">
			              	<span class="badge badge-danger"><i class="fa fa-money"></i> bKash account</span><br>
			              	<label>Account No.</label>
			              	<input type="number" name="bkash_number" class="form-control"><br>
			              	<button class="btn btn-danger float-right"><i class="fa fa-paper-plane"></i> bKash pay</button>

			            </div>
			            
			            </div>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="bootstrap.min.js"></script>
    
</body>
</html>