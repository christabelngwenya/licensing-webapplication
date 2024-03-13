<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
$expireDate = gmdate('D, d M Y H:i:s \G\M\T', strtotime('-1 day'));
header("Expires: $expireDate");
?>

<!DOCTYPE html>
<html>
   <head>
    <title>Licensinig Login Page</title>
    <link rel="stylesheet" type="text/css" href="login.css">
   </head>
   <body>

  
       <div class="login-logo">
           <div class="logo">
               <img src="BCC-removebg-preview(4).png" alt="City of Bulawayo">
               <h1>Shop Licensing</h1>
               <h2>CITY OF BULAWAYO</h2>
               <h3>Shop Licensing Made Convenient</h3>
           </div>
           <div class="login-form" >
         
           <form action="login_auth.php" method="POST">
                <?php
                session_start();
                if(isset($_SESSION['error'])){
                    echo'<p style="color:red; font-weight:450;font-size:16px;">'.$_SESSION['error'].'</p>';
                    unset($_SESSION['error']);
                }
              ?>  
              
            <h1>LOGIN TO YOUR ACCOUNT </h1>
            <input type="text" placeholder="Username" name="username" autocomplete="off" required/>
            <input type="password" placeholder="Password" name="passwrd" autocomplete="off"   required/>
            <button type="submit">Login</button>
            <a href="admin_login.php" id="admin" class="nav-btn">Admin </a>
            </form>

           </div>
       </div>
   </body>
</html>
