<?php
include 'connect.php';
session_start();
if (!isset($_SESSION["username"]))
    header("location:login.php");
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 

    <title> Records</title>
    <link rel="stylesheet" type="text/css" href="display_results.css">
    

</head>

<body?>

    <div class="btn-box">

        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                    <th scope="col">Account Number</th>
                     <th scope="col">tax clearance</th>
                     <th scope="col">trade type</th>
                     <th scope="col"> vending machine</th>
                     <th scope="col">condition</th>
                     <th scope="col"> receipt number</th>
                     <th scope="col"> range number</th>
                     <th scope="col">floor area</th>
                     <th scope="col">expiring date</th>
                     <th scope="col">license fee</th>
                     <th scope="col">pernality fee</th>
                     <th scope="col">any other</th>
                     <th scope="col">license name</th>
                     <th scope="col">trading as</th>
                     <th scope="col">owner's name</th>


                </tr>
            </thead>
            <tbody>
                <?php


                if (isset($_SESSION["search"])) {
                    $search = $_SESSION["search"];
                    $sql = "SELECT * FROM records WHERE account_number LIKE\"%$search%\" ";
                    $query_run = mysqli_query($conn, $sql);
                    if ($query_run) {
                        while ($row = mysqli_fetch_assoc($query_run)) {   
                            $id = $row['id'];
                            $account_number = $row['account_number'];
                            $tax_clearence = $row['clearence_number'];
                            $trade_type =  $row['trade_type'];
                            $vending_machine =  $row['vending_machine'];
                            $condition_given=  $row['condition_given'];
                            $receipt_number  = $row['receipt_number'];
                            $range_number = $row['range_number'];
                            $floor_area= $row['floor_area'];
                            $expiring_date= $row['expiring_date'];
                            $address_number= $row['address_number'];
                            $license_fee= $row['license_fee'];
                            $penalty_fee= $row['fine'];
                            $any_other= $row['any_other'];
                            $name_of_license= $row['name_of_license'];
                            $trading_as= $row['trading_as'];
                            $name_of_owner= $row['name_of_owner'];
                            echo '

                   
    <tbody>
        <tr>
            <th scope = "row">' .  $id . '</th>
            <td>' .$account_number. '</td>
            <td>' . $tax_clearence . '</td>
            <td>' .  $trade_type  . '</td>
            <td>' .   $vending_machine . '</td> 
            <td>' . $condition_given . '</td>
            <td>' . $receipt_number . '</td>
            <td>' .$range_number . '</td>
            <td>' .$floor_area  . '</td>
            <td>' . $expiring_date . '</td>
            <td>' .$address_number . '</td>
            <td>' . $license_fee . '</td>
            <td>' .$penalty_fee  . '</td>
            <td>' . $any_other. '</td>
            <td>' . $name_of_license . '</td>
            <td>' . $trading_as . '</td>
            <td>' . $name_of_owner. '</td>

          
        </tr>
    </tbody>
    ';
                        }
                    } else {
                        echo '<h2 style="color:red;">Results Not Found</h2>';
                    }
                }

                ?>
            </tbody>
        </table>
    </div>

    <div>


    </div>


    </body>