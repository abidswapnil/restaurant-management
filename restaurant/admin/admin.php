<?php
  
  error_reporting(0);
  session_start();
  $admin = $_SESSION['name']; 
  require'config.php';

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
  //echo $num_rows;
  

        
 
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
      <div class="mt-3">
        <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModalScrollable">
          <i class="fa fa-pencil"></i> Notices
        </button>

        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header bg-warning">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Write notice <i class="fa fa-pencil"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="" method="POST">
            <small>Write notice for customer.</small>
            <input type="text" name="title" placeholder="notice title" class="form-control" required=""><br>
            <textarea rows="5" class="form-control" placeholder="your notice" name="notice" required=""></textarea>
            <small class="text-muted">Notice will be shown on customer homepage.</small>
            <br><br>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" data-dismiss="modal">Close</button>
              <button  class="btn btn-success"><i class="fa fa-paperclip"></i> Post</button>
            </div>
            </form>
            </div>
          </div>
        </div>
          <h4 class="">Welocome!</h4>
          <hr>
          <?php 
          
              if(isset($_POST['notice'],$_POST['title']))
              {
                echo "<div class='alert alert-success'>Post successful!</div>";

                 $_SESSION['notice'] = $_POST['notice'];
                 $_SESSION['title'] = $_POST['title'];
              }

          ?>
        <div class="list-group mt-4">
        <div class="list-group-item list-group-item-action shadow-sm p-3 mb-5 mt-2 bg-white rounded">
          <?php

             $sql = "SELECT * FROM events";
             $result = $conn->query($sql);
             if($result ->num_rows >0)
             {
                while($row = $result->fetch_assoc())
                {
                   $event_id =$row['event_id'];
                   $event = $row['event_name'];
                   $location = $row['location'];
                   $strt = $row['start_time'];
                   $about = $row['about'];
                   $creator = $row['creator'];
                   $date = date('y-m-d');
                ?>
                <div>
              <div class="modal-header bg-light">
                <legend><?php echo $event_id.". "; echo $event; ?></legend>
              </div>
              <small class="text-muted"><?php echo $date; ?></small>
            </div>
            <table class="table table-borderless"> 
              <tr>
                <td>Location:</td>
                <td><?php echo $location; ?></td>
              </tr>
              <tr>
                <td>Time:</td>
                <td><?php echo $strt; ?></td>
              </tr>
              <tr>
                <td>About:</td>
                <td class="text-justify">
                  <?php echo $about; ?>
                </td>
              </tr>
            </table>
            <small class="modal-footer bg-light font-weight-bold">Created by <?php echo $creator; ?></small><hr>
                <?php  

                }

             }  

          ?>
          
          
        </div>
      </div>
        
      </div>
      <!--<form action="http://localhost/restaurant/customer/food/customer.php" method="POST">
        <button>clickme</button>>
      </form>>-->
     
      
    </div>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="bootstrap.min.js"></script>
</body>
</html>

