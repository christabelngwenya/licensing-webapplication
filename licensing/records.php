<?php
include 'connect.php';

?>

<!DOCTYPE html>
<html>
<head>
   <title>Record Display</title>
   <link rel="stylesheet" type="text/css" href="records.css">
</head>
<body>
   <header>
   <nav class="navbar">
           <a href="index.php" class="nav-btn" >Home</a>
               <a href="logout.php"  class="nav-btn">Logout</a>
               <form action="search.php" method="post">
                      <div id="search-container">
         <input type="text" class="search-input" name="search" type="text" autocomplete="off" placeholder="Search for account...">
         <button class="search-btn" name="submit" value="Search">Search</button>
 
     </div>
               </form>
        
        
     </nav>

    
      
   </header>
   <main>
      <div class=" table-container ">

   
   <h1 style="color:white;text-align:center;";>Record Display</h1>
       <table class="table">
           <tr>
              <th>ID</th>
               <th>Account Number</th>
                <th>tax clearance</th>
                <th>trade type</th>
                <th> vending machine</th>
               <th>condition</th>
               <th> receipt number</th>
              <th> range number</th>
              <th>floor area</th>
              <th>expiring date</th>
              <th>license fee</th>
              <th>pernality fee</th>
               <th>any other</th>
               <th>license name</th>
               <th>trading as</th>
               <th>owner's name</th>
             
                     
               
 
           </tr>
           <!-- PHP code for generate table rows  -->
           <?php



$sql = "SELECT * FROM records";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr onclick=\"location.href='edit.php?id=".$row["id"]."'\">";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["account_number"]."</td>";
        echo "<td>".$row["clearence_number"]."</td>";
        echo "<td>".$row['trade_type']."</td>";
        echo "<td>".$row['vending_machine']."</td>";
        echo "<td>".$row['condition_given']."</td>";
        echo "<td>".$row['receipt_number']."</td>";
        echo "<td>".$row['range_number']."</td>";
        echo "<td>".$row['floor_area']."</td>";
        echo "<td>".$row['expiring_date']."</td>";
        echo "<td>".$row['address_number']."</td>";
        echo "<td>".$row['license_fee']."</td>";
        echo "<td>".$row['fine']."</td>";
        echo "<td>".$row['any_other']."</td>";
        echo "<td>".$row['name_of_license']."</td>";
        echo "<td>".$row['trading_as']."</td>";
        echo "<td>".$row['name_of_owner']."</td>";
     


        echo "</tr>";
    }
    echo "</table>";
} else {
   echo '<h2 style="color:red;">Data Not Found</h2>';
}

$conn->close();
?>

       </table>
       </div>
   </main> 
   <script>
      
   </script>
</body>
</html>
