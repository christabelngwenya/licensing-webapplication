<?php
include 'connect.php';
session_start();
$username = $_POST['username'];
$passwrd = $_POST['passwrd'];

$stmt = $conn->prepare("INSERT INTO login (username, passwrd) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $passwrd);

// Execute the statement
if ($stmt->execute()) { 

  //after succesfully deleting
  $_SESSION['success_messagec']= "User was successfully added!";
  header("location:admin.php");
  
}
 else {
  $_SESSION['error']= "Failed to add user ";
  header("location: admin.php");
  exit();
}
?>
