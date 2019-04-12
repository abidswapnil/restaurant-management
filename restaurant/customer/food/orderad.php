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
   <meta charset="utf-8">
   <meta name="viewport" content="width-device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compitable" content="ie=edge">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!--<meta http-equiv="refresh" content="3">-->
<body>
  <style>
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
    <nav class="navbar bg-dark navbar-expand-sm">
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
           <a href="http://localhost/restaurant/customer/food/orderad.php" class="nav-link text-white">Orders</a>
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
      <div>
      </div>
      <div class="mt-3">
        <div class="header">
          <legend>Orders</legend><hr>
        </div>
        <form action="" method="POST">
        <?php 

          

         $sql = "SELECT * FROM orders";

         $result = $conn ->query($sql);

         if ($result->num_rows > 0)
        {
          $i = 0;
          echo "<table class='table bg-light mt-4'>";

          while($row = $result->fetch_assoc())
          {
            $i++;

             $image[$i] = $row['image'];
             $id[$i] = $row["order_id"];
             $item[$i] = $row["item"];
             $pieces[$i] = $row["pieces"];
             $size[$i] = $row["size"];
             $time[$i] = $row["time"];
             $food_id[$i] = $row['food_id'];  
             $contact[$i] = $row['contact'];

              echo "<tr class=''><td><img src=$image[$i] class='rounded' style='height:50px; width:60px;'></td><td>" . $item[$i]. " </td><td>" . $pieces[$i]. " pieces</td><td>".$size[$i]."</td><td>".$time[$i]."</td><td>".$contact[$i]."</td><td><input type='submit' class='btn btn-info' name='serve".$i."' value='Serve'><input type='submit' class='btn btn-danger ml-1' name='cancel".$i."' value='Cancel'></td></tr>";
          }
          echo "</table>";
          $num_orders = $i;

          for ($i=1; $i <= $num_orders ; $i++) { 
            
            $cancel_btn ='cancel'.$i;
            $serve_btn = 'serve'.$i;

            if(isset($_POST[$serve_btn]))
            {
              $selected_id = $id[$i];
              #$_SESSION['id'] = $selected_id;

               $sql = "DELETE FROM orders WHERE order_id='$selected_id'";
               $conn->query($sql);

               echo "<script>window.location.href='http://localhost/restaurant/customer/food/orderad.php';</script>";

            }
            elseif(isset($_POST[$cancel_btn]))
            {
              $selected_id = $id[$i];
              #echo $selected_id;

              $sql = "SELECT pieces FROM food WHERE food.food_id='$food_id[$i]'";
              $result = $conn->query($sql);
              if($result->num_rows > 0)
              {
                 while($row =$result->fetch_assoc())
                 {
                    $piece = $row['pieces'];
                 }
                 $new_amount = $piece + $pieces[$i];
                 
                 $sql = "UPDATE food SET food.pieces='$new_amount' WHERE food.food_id='$food_id[$i]'";
                 $sql1 = "DELETE FROM orders WHERE orders.order_id ='$selected_id'";
                 $conn->query($sql);
                 $conn->query($sql1);

                 echo "<script>window.location.href='http://localhost/restaurant/customer/food/orderad.php';</script>";


              } 

            }
          }


        }
        else
        {
          echo "<div class='alert alert-info text-center'>You have 0 order to delivery!</div>";
        } 
        ?>
        
      </div>
     
      
    </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="bootstrap.min.js"></script>
</form>
</body>
</html>









