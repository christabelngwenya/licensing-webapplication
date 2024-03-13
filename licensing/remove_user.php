<?php
include 'connect.php';

$username = $_POST['username'];

$stmt = $conn->prepare("DELETE FROM login WHERE username=?");
$stmt->bind_param("s", $username);

// Execute the statement
if ($stmt->execute()) { 

   //after succesfully deleting
   $_SESSION['success_messagec']= "Record was successfully deleted!";
   header("location:admin.php");
   
 }
  else {
   $_SESSION['error']= "Failed to Delete Record ";
   header("location: admin.php");
   exit();
}

$stmt->close();
$conn->close();
?>
