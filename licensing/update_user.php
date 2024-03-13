<?php
include 'connect.php';
session_start();

$username = $_POST['username'];
$new_password = $_POST['new_password'];

$stmt = $conn->prepare("UPDATE login SET passwrd=? WHERE username=?");
$stmt->bind_param("ss", $new_password, $username);

// Execute the statement
if ($stmt->execute()) { 

  //after succesfully deleting
  $_SESSION['success_messagec']= "user credentials were successfully updated!";
  header("location:admin.php");
  
}
 else {
  $_SESSION['error']= "Failed to update user credentials  ";
  header("location: admin.php");
  exit();
}
$stmt->close();
$conn->close();

