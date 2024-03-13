<?php
include 'connect.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = $_POST['username'];
   $passwrd = $_POST['passwrd'];

   $stmt = $conn->prepare("SELECT * FROM admini WHERE username = ? AND passwrd = ?");
   $stmt->bind_param("ss", $username, $passwrd);
   $stmt->execute();
   $result = $stmt->get_result();

   if ($result->num_rows > 0) {
       $_SESSION['loggedin'] = true;
       $_SESSION['username'] = $username;
       header("location: records.php");
   } else {
    $_SESSION['error']= "Incorrect  Username or Password ";
    header("location: records_login.php");
    exit();
   }

   $stmt->close();
   $con->close();
}

