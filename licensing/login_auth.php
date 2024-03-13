<?php
include 'connect.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = $_POST['username'];
   $password = $_POST['passwrd'];

   $stmt = $conn->prepare("SELECT * FROM login WHERE username = ? AND passwrd = ?");
   $stmt->bind_param("ss", $username, $password);
   $stmt->execute();
   $result = $stmt->get_result();

   if ($result->num_rows > 0) {
       $_SESSION['loggedin'] = true;
       $_SESSION['username'] = $username;
       header("location: index.php");
       
   } else {
   $_SESSION['error']= "Incorrect  Username or Password ";
   header("location: login.php");
   exit();
   }

   $stmt->close();
   $con->close();
}

