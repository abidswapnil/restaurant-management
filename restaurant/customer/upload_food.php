<?php

 error_reporting(0);
 require 'config.php';
 session_start();
 $category = $_SESSION['category'];
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


$sql = "SELECT category.cat_id FROM category WHERE category.category='$category'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       
       $cat_id = $row['cat_id'];
    }
} else {
    echo "0 results";
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
	<form action="" method="POST" enctype="multipart/form-data" class="form-group container">

    <legend>Add food here</legend>

     <?php  

       if(isset($_POST['food_name'],$_POST['food_price'],$_POST['pieces']))
        {
          $food_name=strtolower($_POST['food_name']);
          $food_price =$_POST['food_price'];
          $pieces = $_POST['pieces'];
                         
          $file = 'image';

          $file1 = $_FILES[$file];
       
          $filename = $_FILES[$file]['name'];
          $fileTmpName = $_FILES[$file]['tmp_name'];
          $fileSize = $_FILES[$file]['size'];
          $fileError = $_FILES[$file]['error'];
          $fileType = $_FILES[$file]['type'];
            
          $fileExt = explode('.', $filename);
          $fileActualText = strtolower(end($fileExt));


          $allowed = array('jpg','jpeg','pnj');

          if(in_array( $fileActualText,$allowed))
          {
            if($fileError == 0)
            {
              if($fileSize < 100000000)
              {
                $fileNameNew = $filename;
                $fileDestination = 'food/'.$fileNameNew;

                #echo "file name new :".$fileNameNew;

                move_uploaded_file($fileTmpName, $fileDestination);

                $sql1 = "INSERT INTO food(food_name,food_price,cat_id,pieces,image,category) VALUES('$food_name','$food_price','$cat_id','$pieces','$fileNameNew','$category')";

                $sql = "UPDATE category SET category.image='$fileNameNew' WHERE category.cat_id='$cat_id'";

                if($conn->query($sql1) == TRUE AND $conn->query($sql) == TRUE)
                { 
                   echo "<script>window.location.href='http://localhost/restaurant/customer/food/product.php';</script";


                }
                  
              }
              else
              {
                echo "<div class='text-success'> Your file is too big</div>";

              }

            }
            else
            {
              echo "<div class='text-success'> There was an error uploading your file</div>";
            }

          }
          else
          {
            echo "<div class='text-success'> You can't upload this type of file</div>";
          }
          


        }




     ?>
    <div class="mt-3">
  		<input type="text" name="food_name" placeholder="food name..." required="" class="form-control "><br><br>
  		<input type="number" name="food_price" placeholder="price.." required="" class="form-control"><br><br>
  		<input type="number" name="pieces" placeholder="pieces.." required="" class="form-control"><br><br>
  		<input type="file" name="image" required=""><br><br>
  		<input type="submit" name="upload" value="upload" class="btn btn-info">
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="bootstrap.min.js"></script>
		


	</form>

</body>
</html>