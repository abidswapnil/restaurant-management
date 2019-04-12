<?php 
     
     error_reporting(0);
     require 'config.php';
     session_start();
     $id = $_SESSION['id'];
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

     $sql = "SELECT * FROM food WHERE food.food_id = '$id'";
     $result = $conn->query($sql);

     if($result ->num_rows >0)
     {
     	while($row= $result->fetch_assoc())
     	{
     		 $id = $row['food_id'];
             $image = $row['image'];
             $item = $row["food_name"];
             $pieces = $row["pieces"];
             $price = $row["food_price"];
             $category = $row["category"];
     	}
     }


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
   <meta name="viewport" content="width-device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compitable" content="ie=edge">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title></title>
</head>
<body>
	<form action="" method="POST">
		<nav class="navbar bg-dark navbar-expand-sm">
      <a href="" class="navbar-brand text-white">Admin | <?php echo $admin; ?></a>       
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
    <div class="container">
    	<?php  

    	   if (isset($_POST['food_name'],$_POST['food_price'],$_POST['pieces'])) {
    	   	     
    	   	     $food = $_POST['food_name'];
    	   	     $price = $_POST['food_price'];
    	   	     $pieces = $_POST['pieces'];

    	   	     $sql = "UPDATE food SET food_name ='$food',food_price='$price',pieces='$pieces' WHERE food_id='$id'";
    	   	     if($conn->query($sql) == TRUE)
    	   	     {
    	   	     	echo "<script>window.location.href='http://localhost/restaurant/customer/food/product.php';</script>";
    	   	     }
    	   }



    	?>
		<table class="table mt-4">
				<tr class="row bg-light">
					<td><img src="<?php echo $image; ?>" class='rounded' style='height:50px; width:60px;'></td>
					<td>Food: <input type="text" name="food_name" value="<?php echo $item; ?>"></td>
					<td>Price: <input type="number" name="food_price" value="<?php echo $price; ?>"></td>
					<td>Avilability: <input type="number" name="pieces" value="<?php echo $pieces; ?>"></td>
					<td><input type="text" name="category" value="<?php echo $category; ?>" disabled=""></td>
					<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalScrollable">
          Save
        </button></td>

        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header text-danger">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Alert!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="" method="POST">
               <div class="text-dark">Are you sure,you want to edit <?php echo $item; ?> and all orders for <?php echo $item;?> are served?</div> 
            </div>
            <div class="modal-footer">
              <button class="btn btn-success" name="yes">Yes</button>
              <button  class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
            </form>
            </div>
          </div>
        </div>
				</tr>
		</table>
	</div>
		
	</form>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="bootstrap.min.js"></script>

</body>
</html>