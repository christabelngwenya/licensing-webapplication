<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link rel="stylesheet" type="text/css" href="admin.css">

</head>
<body>
    <div class="container">
        <h1 class="title">ADMIN USE ONLY</h1>
         <div class="card">
        <div class="card-header">
         <h4>User Management</h4>
        </div>

                
                <div class="card-body">
                       <h5 class="card-title">Add  New User</h5>
                    <form method="post" action="add_user.php">
                    <?php
                
                if(isset($_SESSION['error'])){
                    echo'<p style="color:red; font-weight:450;font-size:16px;">'.$_SESSION['error'].'</p>';
                    unset($_SESSION['error']);
                }
              ?>  
                <?php
               
               if(isset($_SESSION['success_message'])){
                  echo'<p style="color:green; font-weight:450;font-size:16px;">'.$_SESSION['sucess_message'].'</p>';
                  unset($_SESSION['success_message']);
              }

             
               ?>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="passwrd" name="passwrd" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </form>
                </div>


                <div class="card-body">
                       <h5 class="card-title">Update User Login Details</h5>
                    <form method="post" action="update_user.php">
                    <?php
                
                if(isset($_SESSION['error'])){
                    echo'<p style="color:red; font-weight:450;font-size:16px;">'.$_SESSION['error'].'</p>';
                    unset($_SESSION['error']);
                }
              ?>  
                <?php
               
               if(isset($_SESSION['success_message'])){
                  echo'<p style="color:green; font-weight:450;font-size:16px;">'.$_SESSION['sucess_message'].'</p>';
                  unset($_SESSION['success_message']);
              }

             
               ?>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password:</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
             <h5 class="card-title">Remove User</h5>
        <form method="post" action="remove_user.php">
        <?php
                
                if(isset($_SESSION['error'])){
                    echo'<p style="color:red; font-weight:450;font-size:16px;">'.$_SESSION['error'].'</p>';
                    unset($_SESSION['error']);
                }
              ?>  
                <?php
               
               if(isset($_SESSION['success_message'])){
                  echo'<p style="color:green; font-weight:450;font-size:16px;">'.$_SESSION['sucess_message'].'</p>';
                  unset($_SESSION['success_message']);
              }

             
               ?>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <button type="submit" class="btn btn-danger">Remove User</button>
        </form>
        </div>
</body>
</html>
