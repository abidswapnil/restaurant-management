<?php

  error_reporting(0);
  require 'config.php';
  session_start();
  $admin = $_SESSION['name']; 
  //$cust_id = $_SESSION['cust_id'];

  if($admin == '')
  {
    echo "<script>window.location.href='http://localhost/restaurant/customer/food/customer.php';</script>";
  }

  $sql="SELECT count(table_id) AS total FROM tables WHERE tables.reserve_status='1'";
  $result = mysqli_query($conn,$sql);
  $values = mysqli_fetch_assoc($result);
  $reservation= $values['total'];

  
  $sql="SELECT count(order_id) AS total FROM orders";
  $result = mysqli_query($conn,$sql);
  $values = mysqli_fetch_assoc($result);
  $order= $values['total'];

  $sql = "SELECT count(q_id) AS total FROM question";
  $result = mysqli_query($conn,$sql);
  $values = mysqli_fetch_assoc($result);
  $faq= $values['total'];

  if(isset($_POST['capacity']))
  {
    $capacity = $_POST['capacity'];

    $sql = "INSERT INTO tables (table_info,reserve_status) VALUES ('$capacity','0')";
    $conn->query($sql);

    echo "<script>window.location.href='http://localhost/restaurant/admin/reservation.php';</script>";
  }

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
           <a href="http://localhost/restaurant/admin/reservation.php" class="nav-link text-white">Reservations<span class="badge badge-success align-top ml-1"></span></a>
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
          <legend>Reservation</legend>
        </div>
        <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModalScrollable">
        <i class="fa fa-plus"></i> Add table
        </button>
        <p><?php if($reservation==0){} else{echo "You have $reservation reservation";} ?></p>
        <form action="" method="POST">
          <div class="table-responsive-lg"><table class="table bg-light mt-4 table-hover"><th>Table ID:</th><th>Status</th><th>Purpose</th><th>Meal plan</th><th>Time</th><th>Date</th><th>Reserver</th><th>Action</th>
          <?php

              $sql = "SELECT * FROM reservations";
              $result = $conn->query($sql);
              if($result->num_rows >0)
              {
                $i =0;
                while($row = $result->fetch_assoc())
                {
                  $i++;
                  $reserve_id[$i] = $row['reserve_id'];
                  $table_id[$i] = $row['table_id'];
                  $purpose[$i]= $row['purpose'];
                  $meal[$i] = $row['meal_plan'];
                  $time[$i] = $row['time'];
                  #$table[$i] = $row['table_name'];
                  $status[$i] = $row['reserve_status'];
                  $date[$i] = $row['date'];
                  #$info[$i] = $row['table_info'];
                  $cust_id[$i]= $row['cust_id'];
                  $cust_email[$i] = $row['cust_email'];

                  if($status[$i] == 1){
                    echo "<tr><td><span class='badge badge-info badge-pill'>$table_id[$i]</span></td><td><span class='badge badge-success'>Reserved</span></td><td>$purpose[$i]</td><td>$meal[$i]</td><td>$time[$i]</td><td>$date[$i]</td><td>$cust_email[$i]</td><td><input type='submit' class='btn btn-danger' value='Cancel' name='cancel".$i."'><input type='submit' class='btn btn-success ml-2' value='Confirm' name='confirm".$i."' disabled=''></td></tr>";
                  }
                  elseif($status[$i] == 0)
                  {
                     echo "<tr><td><span class='badge badge-info badge-pill'>$table_id[$i]</span></td><td><span class='badge badge-warning'>Unreserved</span></td><td>$purpose[$i]</td><td>$meal[$i]</td><td>$time[$i]</td><td>$date[$i]</td><td>$cust_email[$i]</td><td><input type='submit' class='btn btn-danger' value='Cancel' name='cancel".$i."'><input type='submit' class='btn btn-success ml-2' value='Confirm' name='confirm".$i."'></td></tr>";
                  }
              
                }
                $num_table=$i;

              }
              for($i=1;$i<= $num_table;$i++) 
              {
                $confirm_btn ='confirm'.$i;
                $cancel_btn = 'cancel'.$i;
                if(isset($_POST[$cancel_btn])){

                  $sql ="DELETE FROM reservations WHERE reservations.reserve_id='$reserve_id[$i]'";
                  $sql1 = "INSERT INTO notifications (notification,cust_id,reserve_status,purpose,meal_plan)VALUES ('$table_id[$i]','$cust_id[$i]','0','$purpose[$i]','$meal[$i]')";
                  $conn->query($sql);
                  $conn->query($sql1);
                
                    echo "<script>window.location.href='http://localhost/restaurant/admin/reservation.php';</script>";
                  
                }
                elseif(isset($_POST[$confirm_btn]))
                {
                   $selected_id = $table_id[$i];
                   $sql = "UPDATE reservations SET reservations.reserve_status='1' WHERE reservations.reserve_id='$reserve_id[$i]'";

                   $sql1 ="INSERT INTO notifications(notification,cust_id,reserve_status,purpose,meal_plan)VALUES ('$table_id[$i]','$cust_id[$i]','1','$purpose[$i]','$meal[$i]')";
                   $conn->query($sql);
                   $conn->query($sql1);
                   echo "<script>window.location.href='http://localhost/restaurant/admin/reservation.php';</script>";
                }
              } 

          ?>
        </table></div>
        </form>
        
      </div>
      <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <h5 class="modal-title" id="exampleModalScrollableTitle">New table</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="" method="POST">
           <label>Table capacity:</label>
          <input type="number" name="capacity" placeholder="capacity" required="" class="form-control"
          min="3" max="12">
          </div><br>
          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
            <button  class="btn btn-success">Add</button>
          </div>
          </form>
          </div>
        </div>
    </table>

    </form>
     
      
    </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="bootstrap.min.js"></script>
</body>
</html>









