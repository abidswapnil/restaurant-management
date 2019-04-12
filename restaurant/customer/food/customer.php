<?php  
     
    session_start(); 
    error_reporting(0);
    require'config.php';

    if(isset($_POST['signin'])){

        if(isset($_POST['email'],$_POST['password']))
        {
          $email = $_POST["email"];
          $password = $_POST["password"];

          $md5pass = md5($password);
          $sha1pass = sha1($password);
            //$cryptpass = crypt($mainpass,st);
          $finalpass = $password.$md5pass.$sha1pass;
          $sql = "SELECT name,password,cust_id FROM customer WHERE customer.email ='$email'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) 
          {
              // output data of each row
              while($row = $result->fetch_assoc()) 
              {
                  $name = $row['name'];
                  $pass = $row['password'];
                  $id = $row['cust_id'];
                  $_SESSION['cust_id'] = $id;

                  $_SESSION['name'] = $name;
                  $_SESSION['email'] = $email;
              }
              if($finalpass == $pass)
              {
                 echo "<script>window.location.href='http://localhost/restaurant/customer/food/home_test.php';</script>";
              }
              else
              {
                echo "<div class='alert alert-danger text-center'>entered wrong password!</div>";
              }


          }
          else
          {
             $sql = "SELECT name,password FROM admin WHERE admin.email ='$email'";
             $result = $conn->query($sql);

             if($result ->num_rows >0)
             {
                while($row = $result->fetch_assoc())
                {
                   $admin = $row['name'];
                   $adminpass = $row['password'];

                   $_SESSION['name'] = $admin;
                }
                if($finalpass == $adminpass)
                {
                  echo "<script>window.location.href='http://localhost/restaurant/admin/admin.php';</script>";

                }
                else
                {
                  echo "<div class='alert alert-danger text-center'>entered wrong password!</div>";
                }
             }
             else
             {
                echo "<div class='alert alert-danger text-center'>No such account exist. <a href='' class='alert-link' data-toggle='modal' data-target='#signupModal'>Creat account</a></div>";
             }
            
          }

         
        }
      }
      if(isset($_POST['signup']))
      {
        if(isset($_POST['username'],$_POST['email'],$_POST['password'],$_POST['contact']))
        {
           $username = $_POST['username'];
           $email = $_POST['email'];
           $password = $_POST['password'];
           $contact = $_POST['contact'];

           $md5pass = md5($password);
           $sha1pass = sha1($password);

           $finalpass = $password.$md5pass.$sha1pass;

           $sql = "INSERT INTO customer (name,email,password,contact) VALUES ('$username','$email','$finalpass','$contact')";

           if($conn->query($sql) == TRUE)
           {
              echo "<div class='alert alert-success text-center'>successfuly registered. <a class='alert-link' href='' data-toggle='modal' data-target='#signinModal'>Sign in</a></div>";

           }
           else
           {
              echo "<div class='alert alert-danger text-center'>Try again with another email!</div>";
           }


        }
      }
      if(isset($_POST['']))

?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
   <meta name="viewport" content="width-device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compitable" content="ie=edge">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Customer|Mr. cheese</title>

</head>
<body>
    
     <div class="modal" id="signinModal">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header bg-warning">
             <h5 class="modal-title">Sign in</h5>
             <button class="close" data-dismiss="modal">&times;</button>
           </div>
           <small class="ml-3 text-muted">Sign in for ordering us.</small>
           <div class="modal-body">
             <form action="" method="POST">
               <div class="form-group">
                 <label for="email">Email:</label>
                 <input class="form-control" type="email" name="email" placeholder="email" required="">
               </div>
               <div class="form-group">
                 <label for="password">Password:</label>
                 <div class="input-group">
                   <input class="form-control" type="password" name="password" placeholder="password" required="">
                   <div class="input-group-append">
                     <div class="input-group-text"><i class="fa fa-eye"></i></div>
                   </div>
                 </div>
               </div>
               <a href="http://localhost/restaurant/pass_recovery.php" class="">forgotten password?</a>
               <div class="modal-footer">
                 <button class="btn btn-success" name="signin">Sign in</button>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
     <div class="modal" id="signupModal">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header bg-warning">
             <h5 class="modal-title">Sign up</h5>
             <button class="close" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body">
             <form action="" method="POST">
              <div class="form-group">
                <label for="username">Username:</label>
                 <input class="form-control" type="text" name="username" placeholder="username" required="">
                 <small class="text-muted">Note: Username first letter should be capital letter.</small>
              </div>
               <div class="form-group">
                 <label for="email">Email:</label>
                 <input class="form-control" type="email" name="email" placeholder="email" required="">
               </div>
               <div class="form-group">
                 <label for="password">Creat password:</label>
                 <input class="form-control" type="password" name="password" placeholder="password" required="">
               </div>
               <div class="form-group">
                 <label for="contact">Contact-info:</label>
                 <input class="form-control" type="text" name="contact" placeholder="your mobile number" required="">
               </div>
               <div class="modal-footer">
                 <button class="btn btn-success" name="signup">Sign up</button>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
     <div class="modal" id="noticeModal">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header bg-light">
             <h5 class="modal-title">Notice</h5>
             <button class="close" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body text-justify">
            <header><legend><?php 

             $title = $_SESSION['title'];  

             echo $title; ?></legend>
           </header><hr>
            <?php
               $notice = $_SESSION['notice']; 

               echo $notice;


            ?>
           </div>
         </div>
       </div>
     </div>
     <div class="modal" id="applyModal">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header bg-info">
             <h5 class="modal-title">Apply form</h5>
             <button class="close" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body">
             <form action="" method="POST">
              <div class="form-group">
                <label for="username">Name:</label>
                 <input class="form-control" type="text" name="username" placeholder="username" required="">
              </div>
               <div class="form-group">
                 <label for="email">Email:</label>
                 <input class="form-control" type="email" name="email" placeholder="email" required="">
               </div>
               <div class="form-group">
                 <label for="password">Position applying for:</label>
                 <select class="form-control" name="position">
                  <option class="select-item">Caterer</option>
                  <option class="select-item">Chef</option>
                 </select>
               </div>
               <div class="form-group">
                 <label for="contact">Contact-info:</label>
                 <input class="form-control" type="text" name="contact" placeholder="your mobile number" required="">
               </div>
               <div class="modal-footer">
                 <button class="btn btn-info" name="signup">Apply now</button>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
  
    <form action="" method="POST">

    <div class='container mt-4'>
      <h1 class="display-1 text-warning">Mr. Cheese</h1>
      
         <div class="row float-right">
           <a class="text-primary" data-toggle="modal" data-target="#signinModal" style="cursor: pointer;">sign in</a>
           <a class="text-primary ml-4" data-toggle="modal" data-target="#signupModal" style="cursor: pointer;">Creat account</a>
           <a class="text-primary ml-4" data-toggle="modal" data-target="#noticeModal" style="cursor: pointer;">Notice</a>
           <a class="text-primary ml-4" data-toggle="modal" data-target="#applyModal" style="cursor: pointer;">Apply to work</a>
           <a class="text-primary ml-4" style="cursor: pointer;" href="http://localhost/restaurant/customer/navbar/staff_panel.php">Our staff</a>
         </div>
      
    <div> 
    
    <?php 


      $sql = "SELECT * FROM food ORDER BY cat_id";
      $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {

        echo "<table class='table'><tr class='row'>";
        while($row = $result->fetch_assoc()) 
        {
          

            $id = $row['food_id'];
            $food = $row['food_name'];
            
            $image = $row['image'];
            $category = $row['category'];
            $price= $row['food_price'];

          //$string .= $id[$i].". ";


          
             echo"<div id='food'><td><div class='text-center bg-warning text-danger p-1 rounded' style='font-size:25px;'>$category</div>
           <img src=$image class='img-thumbnail' style='height:200px; width: 300px;'>
           <div class='text-center p-3 text-danger shadow p-3 mb-5 bg-light rounded text-justify' style='font-size:25px;'><font face='Comic Sans MS'>$food</font><div style='font-size:20px;'>$price BDT</div><input type='submit' class='btn btn-info' name='add' value='Add to cart'></div>
           </td></div>";
        
        }
        if(isset($_POST['add']))
        {
          echo "<div class='text-danger'>*you are not signed in.</div>";
        }


    }  
    
    $conn->close();

    echo "</tr></table>";

     ?>
    </div>
    </div>


   	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="bootstrap.min.js"></script>
        <script src="bootstrap-show-password.min.js"></script>

   </form>	
  
</body>
</html>