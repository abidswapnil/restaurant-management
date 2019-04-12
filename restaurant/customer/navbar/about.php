<?php  
     
    error_reporting(0);
    session_start();
    require'config.php';

    $name = $_SESSION['name'];
    $cust_id = $_SESSION['cust_id'];

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
				 <a href="http://localhost/restaurant/customer/navbar/about.php" class="nav-link text-white">Gallery</a>
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
             session_start();
             $name = $_SESSION['name'];
			 require'config.php';
			 $date= date("Y-m-d h:i:sa");

			 if(isset($_POST['question'],$_POST['email']))
			 {
			 	$question = $_POST['question'];
			 	$email = $_POST['email'];
			 	$sql= "INSERT INTO question (question,name,time,cust_id,email) VALUES ('$question','$name','$date','$cust_id','$email')";

			 	if($conn->query($sql) == TRUE)
			 	{
			 		echo "<div class='alert alert-success'>your answer will be given in time.</div>";
			 	}
			 }

			?>
			<img src="mr_cheese.jpg" class="img-thumbnail shadow-sm p-3 mb-5 bg-white rounded image-expand-md" style="height: 200px; width: 300px;">
			<div class="container shadow-sm p-3 mb-5 bg-white rounded text-justify">
				<legend class="modal-header bg-light">About us</legend>
				<p>
					Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. Always wlcome for your any 
		        <a data-toggle="modal" data-target="#exampleModalScrollable" href="">
		         query?
		        </a>
		        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
		          <div class="modal-dialog modal-dialog-scrollable" role="document">
		            <div class="modal-content">
		              <div class="modal-header bg-warning">
		                <h5 class="modal-title" id="exampleModalScrollableTitle">Your question</h5>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                  <span aria-hidden="true">&times;</span>
		                </button>
		              </div>
		              <div class="modal-body">
		              <form action="" method="POST">
		            <p>Your question should be helpful for our other customers.</p>
		            <textarea rows="5" class="form-control" placeholder="your question" name="question" required=""></textarea>
		            <small class="text-muted">Keep your question short and relevant.</small>
		            <br>
		            <label>Your email:</label>
		            <input type="email" name="email" placeholder="email" class="form-control" required="">
		            </div>
		            <div class="modal-footer">
		              <button class="btn btn-danger" data-dismiss="modal">Close</button>	
		              <button  class="btn btn-success">Ask now</button>
		            </div>
		            </form>
		            </div>
		          </div>
				<small class="text-muted">@mr_cheesekhulna</small>	
			</div>
			 <p class="text-center text-info">Thank you!</p>
		</div>
		<p>
     	  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.9724817938204!2d89.53595101443821!3d22.803483530204154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff85a91f8899fd%3A0x2beb12c132aea2bd!2sMR.+CHEESE!5e0!3m2!1sbn!2sbd!4v1553929914153!5m2!1sbn!2sbd" width="1100" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
        </p>

		
		<!--<div class="text-center"><a href="http://localhost/restaurant/user/navbar/user_question.php">question us</a></div>-->
			
		
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
    					<li><a href="">Link</a></li>
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