<?php
include 'connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account = $_POST['account_number'];
    $tin = $_POST['tax_clearance'];
    $trade = $_POST['trade_type'];
    $condition = $_POST['condition_given'];
    $receipt_number = $_POST['receipt_number'];
    $range_number = $_POST['range_number'];
    $floor_area = $_POST['floor_area'];
    $expiring_date = $_POST['expiring_date'];
    $address = $_POST['address_number'];
    $license_fee = $_POST['license_fee'];
    $penalty_fee = $_POST['penalty_fee'];
    $any_other = $_POST['any_other'];
    $name_of_license = $_POST['name_of_license'];
    $trading_as = $_POST['trading_as'];
    $name_of_owner = $_POST['name_of_owner'];

    $stmt = $conn->prepare("INSERT INTO records (AccountNumber, Tin,TradeType,ConditionGiven,ReceiptNumber,
      RangeNumber,FloorArea, expiring_date, AddressNumber,LIcence,Penalty,Other,LicenceName,TradingAs,OwnerName) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  
    $stmt->bind_param("ssssssssssssssss", $account, $tin, $trade, $condition, $receipt_number, $range_number, $floor_area, $expiring_date, $address, $license_fee, $penalty_fee, $any_other, $name_of_license, $trading_as, $name_of_owner);
  
    if ($stmt->execute()) {
        // Redirect to a success page or display a success message
        header("Location: success.php");
        exit();
   
    } else {
        // Display the specific error message
        echo "Error message: " . $stmt->error;
    
        // Redirect to the error page with the error message
        // header("Location: error.php?error=" . urlencode($stmt->error));
        // exit();
    }
    }
  
    // Close the statement and connection
    $stmt->close();
    $conn->close();

?>