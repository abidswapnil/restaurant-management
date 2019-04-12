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
  //echo $num_rows;
  
  $sql="SELECT count(order_id) AS total FROM orders";
  $result = mysqli_query($conn,$sql);
  $values = mysqli_fetch_assoc($result);
  $order= $values['total'];

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
      <div>
      </div>
      <div class="mt-3">
        <div class="header">
          <legend>All products</legend><hr>
        </div>
        <?php 

         $sql = "SELECT * FROM food";

         $result = $conn ->query($sql);

         if ($result->num_rows > 0)
        {
          $i = 0;
          echo "<div class='table-responsive-lg'><table class='table bg-light mt-4 table-hover'><th>Image</th><th>Item</th><th>Category</th><th>Avilability</th><th>Price</th><th>Status</th><th>Action</th>";

          while($row = $result->fetch_assoc())
          {
            $i++;
             $id[$i] = $row['food_id'];
             $image[$i] = $row['image'];
             $item[$i] = $row["food_name"];
             $pieces[$i] = $row["pieces"];
             $price[$i] = $row["food_price"];
             $category[$i] = $row["category"];  

             if($pieces[$i] > 20)
             {
               echo "<tr><td><img src=$image[$i] class='rounded' style='height:50px; width:60px;'></td><td>" . $item[$i]. " </td><td>Category - " . $category[$i]. " </td><td>" . $pieces[$i]. " pieces</td><td>".$price[$i]." BDT</td><div class='col-12'><td><span class='badge badge-success'>Avialable</span></td><td><input type='submit' class='btn btn-info ml-1' name='edit".$i."' value='Edit'><input type='submit' class='btn btn-danger ml-1' name='delete".$i."' value='Delete'</td></div></tr>";
             }
             elseif($pieces[$i] <=20) 
             {
                echo "<tr><td><img src=$image[$i] class='rounded' style='height:50px; width:60px;'></td><td>" . $item[$i]. " </td><td>Category - " . $category[$i]. " </td><td>" . $pieces[$i]. " pieces</td><td>".$price[$i]." BDT</td><div class='col-12'><td><span class='badge badge-danger'>In short</span></td><td><input type='submit' class='btn btn-info ml-1' name='edit".$i."' value='Edit'><input type='submit' class='btn btn-danger ml-1' name='delete".$i."' value='Delete'</td></div></tr>";

             }  
              /*?>
              <tr>
                <td><img src="<?php echo $image[$i]; ?>" class="rounded" style="height:50px; width: 60px;"></td>
                <td><?php echo $item[$i]; ?></td>
                <td><?php echo $category[$i]; ?></td>
                <td><?php echo $pieces[$i];?></td>
                <td><?php echo $price[$i];?></td>
                <td><button class="btn btn-success" name="edit'.<?php echo $i; ?>'."><i class="fa fa-pencil"></i></button><button class="btn btn-danger ml-1" name="delete"><i class="fa fa-trash"></i></button></td>
              </tr>
              <?php*/
          }
          echo "</table></div>";
          $num_orders = $i;

          for ($i=1; $i <= $num_orders ; $i++) { 

            $edit_btn = 'edit'.$i;
            $delete_btn = 'delete'.$i;

            if(isset($_POST[$edit_btn]))
            {
              $selected_id = $id[$i];
              $_SESSION['id'] = $selected_id;
              echo "<script>window.location.href='http://localhost/restaurant/customer/food/product_edit.php';</script>";

            }
            if(isset($_POST[$delete_btn]))
            {
              $selected_id = $id[$i];
              #$_SESSION['id'] = $selected_id;
              $sql ="DELETE FROM food WHERE food.food_id='$selected_id'";
              $conn->query($sql);

              echo "<script>window.location.href='http://localhost/restaurant/customer/food/product.php'</script>";

            }
          }


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












