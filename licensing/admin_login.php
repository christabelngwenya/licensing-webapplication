<!DOCTYPE html>
<html>
<head>

<title>Admin Login</title>
<link rel="stylesheet" type="text/css" href="admin_login.css">
</head>
<body>
 <div class="login-page">
   <div class="form">
     <form class="login-form" action="admin_verification.php" method="POST">
     <?php
                session_start();
                if(isset($_SESSION['error'])){
                    echo'<p style="color:red; font-weight:450;font-size:16px;">'.$_SESSION['error'].'</p>';
                    unset($_SESSION['error']);
                }
              ?> 
        <h1>Admin Login</h1>
       <input type="text" placeholder="Username" name="username" autocomplete="off" required/>
       <input type="password" placeholder="Password" name="passwrd" required/>
       <button type="submit">Login</button>
     </form>
   </div>
 </div>
</body>
</html>
