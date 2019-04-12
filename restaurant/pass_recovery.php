<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compitable" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-dark bg-warning navbar-expand-sm" style="min-height:70px;">
        <div class="navbar navbar-brand" style="font-size: 30px;">Mr. Cheese</div>

	</nav>

	<div class="container">

		  <?php 

		   require 'config.php';

		   if(isset($_POST['email']))
		   {
		   	  $email = $_POST['email'];
		   	  $sql = "SELECT customer.email FROM customer WHERE customer.email='$email'";

		   	  $result = $conn->query($sql);
		   	  if($result->num_rows >0)
		   	  {
		   	  	 $random = rand(141060,1000000);
			   	 $strlen = strlen($random);

			   	 $_SESSION['random'] = $random;
			     /*echo "<div class='alert alert-success mt-2'><strong>$random</strong> a $strlen digit code sent to <a class='alert-link' href=''>$email</a>.</div>";*/
			     echo "<script>window.location.href='http://localhost/restaurant/code.php';</script>";
		   	  }
		   	  else
		   	  {
		   	  	echo "<div class='alert alert-danger mt-2'>Email not used.</div>";
		   	  }

		   } 

		  ?>
		  <legend class="legend mt-4">Recover password</legend><hr>
		  
		  <div>
		  	<form action="" method="POST">
			  	<table>
			  		<tr>
			  			<label>Email:</label>
			  			<td><input type="email" name="email" placeholder="your email address" required="" class="form-control "><br></td>
			  		</tr>
			  		<tr>
			  			<td><button class="btn btn-success">Send code</button></td>
			  		</tr>
			  	</table>
			</form>

			
		</div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>