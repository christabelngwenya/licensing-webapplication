

<?php
// Get the current year
$currentYear = date("Y");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Licensing Certificate</title>
    <script src="edit.js"></script>
    <script src="https://unpkg.com/pdf-lib@1.18.0/dist/pdf-lib.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.1/print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <link rel="stylesheet" type="text/css" href="edit.css">

</head>
<body>
<?php
include 'connect.php';

// Get the ID from the URL parameter

if (!isset($_GET['id'])) {
  echo "No ID provided.";
  exit();
}
$id = $_GET['id'];



// fetching  data
$sql = "SELECT * FROM records WHERE id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
    $account_number = $row['account_number'];
    $tax_clearance = $row['clearence_number'];
    $trade_type  = $row['trade_type'];
    $vending_machine =$row['vending_machine'];
    $condition= $row['condition_given'];
    $receipt_number =$row['receipt_number'];
    $range_number=$row['range_number'];
    $floor_area =$row['floor_area'];
    $expiring_date =$row['expiring_date'];
    $address =$row['address_number'];
    $license_fee =$row['license_fee'];
    $fine =$row['fine'];
    $any_other =$row['any_other'];
    $name_of_license =$row['name_of_license'];
    $trading_as =$row['trading_as'];
    $name_of_owner = $row['name_of_owner'];
    $issuing_office=$row['issuing_office'];
    $licensing_office =$row['licensing_office'];
} else {
  echo "Record not found";
  exit();
}
?>

</head>

<body>
<nav class="navbar">
       <button id="ExportButton" class="nav-btn">Export to PDF</button>
             <a href="records.php" class="nav-btn">Records</a>
               <a href="index.php"  class="nav-btn">Logout</a>
        
     </nav>

      <main id="certificate">    
         <form id="clientForm" action="save_data.php" method="post" onsubmit="return validateForm()">

          <div id="left-section">
                    <h3 id="company-name">CITY OF BULAWAYO</h3>
                      <img id="company-logo" src="BCC-removebg-preview(4).png" alt="City Of Bulawayo">
                        <p class="shop-license">FULL YEAR'S SHOP LICENCE</p>
              <div id="account-field">
                      <label style="font-size:18px; "for="account_number">Account Number</label>
                        <input id="account_number" type="text" class="custom-font-input" value="<?php echo $account_number; ?>" readonly>
              </div>
                        <label for="tax-clearence" style="display:inline-block;">Tax Clearance Certificate No.</label>
                            <input type="text" id="tax-clearence" class="custom-font-input" name="tax-clearence" style="width: 90px; display:inline-block;" value="<?php echo $tax_clearance; ?>" readonly><br>

                  


                 <table id="clientTable">
                        <tr>
                             <td>Trade/Business</td>
                               <td>Goods</td>      
                        </tr>
                        <tr>
                             <td>Selling</td>
                               <td>Class(es)</td>   
                        </tr>
                        <tr>
                            <td>Other(specify)</td>
                              <td><input type="text" id="trade_type" name="trade_type" class="table-input" value="<?php echo $trade_type; ?>" readonly></td>
                        </tr>
                         <tr>
                            <td>Hiring</td>
                               <td>Class(es)</td>
                        </tr>
                          
                        <tr>
                             <td>Vending Machine</td>
                               <td><input type="text"id="vending_machine" name="vending_machine" class="table-input" value="<?php echo $vending_machine; ?>"readonly></td>     
                        </tr>
                          
                </table>
                    
                          
                          <label style="margin-top:10px;" for="condition_given">Conditions, restrictions or requirements or details of vending</label><br>
                          <input type="text" id="condition_given" class="custom-font-input" name="condition_given" value="<?php echo $condition; ?>" readonly><br>
                          <input  type="text"  id="condition_given" class="custom-font-input"  name="condition_given"><br>
                          <input    type="text"  id="condition_given" class="custom-font-input" name="condition_given"><br>

                          
                          <div id="large-box"></div>
                            <label id="dateStampLabel" for="large-box">Date Stamp</label><br>

                           <label for="receipt_number">Receipt No.</label>
                             <input  type="text" id="receipt_number" name="receipt_number" class="custom-font-input" value="<?php echo $receipt_number; ?>" readonly><br>

                             <label for="range_number">Range  </label>
                              <input  type="text" id="range_number" name="range_number" class="custom-font-input"  value="<?php echo $range_number; ?>"readonly><br>

                             <label for="">Floor Area</label>
                              <input  type="text" id="floor_area" name="floor_area" class="custom-font-input"  value="<?php echo $floor_area; ?>" readonly>
                          
                    


         </div>
            
          <div id="right-section">
                      
                      
                          <label for="expiring_date" style="display:inline-block;">This license expires on 31st December </label>
                           <input type="text" id="expiring_date" class="custom-font-input" style="width: 60px; display:inline-block;" value="<?php echo $currentYear; ?>" readonly><br>

                          <label for="address_number">Address of Licensed Premises:</label><br>
                            <input type="text" id="address_number" class="custom-font-input" name="address_number"  value="<?php echo $address; ?>" readonly><br>
                              <input type="text"id="address_number" class="custom-font-input" name="address_number"><br>
                                <input  type="text"id="address_number" class="custom-font-input" name="address_number"><br>


                          <p>To be completed by the license in accordance to the instructions on reverse</p>
                            <p>1. Fees Tendered:</p><br> 
                        

                          <label style="margin-left: 30px;" for="license_fee">a) For Licence $</label>
                            <input  type="text" id="license_fee" class="custom-font-input"  name="license_fee"  value="<?php echo $license_fee; ?>" readonly><br>

                          
                          <label style="margin-left: 30px;" for="penalty_fee">b)  For Penalty $</label>
                             <input type="text" id="penalty_fee" class="custom-font-input" name="penalty_fee"  value="<?php echo $fine; ?>"readonly><br>
                               <p style="margin-left:38px;font-size: 15px;"><em>(If Applicable)</em></p><br>
                        

                        
                          <label style="margin-left: 30px;" for="any_other">c) Any Other</label>
                            <input  type="text" id="any_other" class="custom-font-input" name="any_other"  value="<?php echo $any_other; ?>" readonly><br>


                
                          <label for="name_of_license">1. Name of Licensee:</label><br>
                             <input type="text"  id="name_of_license" class="custom-font-input" name="name_of_license"  value="<?php echo $name_of_license; ?>"readonly><br>
                               <input type="text" id="name_of_license" class="custom-font-input" name="name_of_license"><br>
                      

                        
                          <label for="trading_as">Trading as :</label><br>
                             <input type="text"  id="trading_as" class="custom-font-input" name="trading_as"  value="<?php echo $trading_as; ?>"readonly><br>
                               <input type="text"  id="trading_as" class="custom-font-input"  name="trading_as"><br>
                          

                          <label for="name_of_owner" style=" margin-top:10px;">2. Name of Person in Actual and Effective Control of the Business</p>
                             <input type="text"  id="name_of_owner" class="custom-font-input"  name="name_of_owner"  value="<?php echo $name_of_owner; ?>" readonly> 



                          
                          <p style="font-weight: bold; margin-top:8px;">................................................................................................</p>
                            <P style="margin-top: 0px; font-size: 16px; margin-bottom: 10px; ">FOR THE USE OF LICENSING AUTHORITY</P>

                        
                            <label for="issuing_office">Issuing Officer</label>
                              <input type="text"  id="issuing_office" class="custom-font-input"  name="issuing_office"  value="<?php echo $issuing_office; ?>" readonly>
                               <p style="text-align: center; font-size: 12px; font-weight: bold;" >Signature</p>
                        
                          <label for="licensing_office">Licensing Officer</label>
                            <input type="text"  id="licensing_office"class="custom-font-input"  name="licensing_office"  value="<?php echo $licensing_office; ?>" readonly>
                             <p style="text-align: center; font-size: 12px; font-weight: bold;">Signature</p>
           </div>
      </form>
                     
 </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
 // Selecting all the navigation buttons
 const navButtons = document.querySelectorAll('.nav-btn');

// Looping through each button and add a click event listener
navButtons.forEach((button) => {
    button.addEventListener('click', () => {
        // Resetting all buttons to their normal state
        navButtons.forEach((btn) => {
            btn.style.backgroundColor = '';
            btn.style.color = '';
        });

        // Setting the clicked button to the hover state
        button.style.backgroundColor = 'purple';
        button.style.color = 'white';
    });
});

  // Function to handle the PDF export process
function exportToPDF() {
  // Get the account number from the form
  const accountNumber = document.getElementById('account_number').value;
   
  // Checking if the account number is valid
  if (!accountNumber) {
    alert('Please enter an account number before exporting.');
    return;
  }

  // Definning the PDF export options
  const pdfOptions = {
    margin: [0,  0],
    filename: 'Account_Number_' + accountNumber + '.pdf', // Use the account number in the filename
    image: { type: 'jpeg', quality:  0.98 },
    html2canvas: { scale:  3 },
    jsPDF: {  
        unit: 'in',  
        format: 'a4',  
        orientation: 'portrait',  
        backgroundColor: '#ffffff'  
    }
  };

  // Triggering the PDF export using html2pdf
  const element = document.querySelector('#certificate');
  html2pdf().set(pdfOptions).from(element).save();
}

// Attach the exportToPDF function to the download button
document.getElementById('downloadButton').addEventListener('click', exportToPDF);



var qrcode = new QRCode(document.getElementById("qrcode"), {
    text: "City Of Bulawayo",
    width: 100,
    height: 100,
    colorDark: "#000000", // Setting the color of the modules to black
    colorLight: "#ffffff" // Setting the color of the empty space around the modules to white
});



    // Getting the form element
    const form = document.getElementById('myForm');

    // Adding an event listener for form submission
    form.addEventListener('submit', function(event) {
        // Preventing the default form submission
        event.preventDefault();

        // Getting the input fields
        const field1 = document.getElementById('account_number');
        const field2 = document.getElementById('tax_clearence');
        const field3 = document.getElementById('trade_type');
        const field4 = document.getElementById('vending_machine');
        const field5 = document.getElementById('condition_given');
        const field6 = document.getElementById('receipt_number');
        const field7 = document.getElementById('range_number');
        const field8 = document.getElementById('floor_area');
        const field9 = document.getElementById('expiring_date');
        const field10 = document.getElementById('address_number');
        const field11= document.getElementById('license_fee');
        const field12= document.getElementById('penalty_fee');
        const field13= document.getElementById('any_other');
        const field14= document.getElementById('name_of_license');
        const field15= document.getElementById('trading_as');
        const field16= document.getElementById('name_of_owner');
        const field17= document.getElementById('issuing_office');
        const field18= document.getElementById('licensing_office');

        // Checking if any of the fields are empty
        if (field1.value === '' || field2.value === ''|| field3.value === ''|| field4.value === ''|| field5.value === ''|| field6.value === ''|| field7.value === ''
        || field8.value === ''|| field9.value === ''|| field10.value === ''|| field11.value === ''|| field12.value === ''|| field13.value === ''|| field14.value === ''
        || field15.value === ''|| field16.value === ''|| field17.value === '') {
            alert('Please fill in all fields before saving.');
        } else {
            // if all fields are filled, proceed with form submission
            form.submit();
        }
    });

    $(document).ready(function() {
    // Get today's date
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() +  1).padStart(2, '0'); // January is  0!
    var yyyy = today.getFullYear();

    // Format the date as MM/DD/YYYY
    var formattedDate = mm + '/' + dd + '/' + yyyy;

    // Create the digital stamp text
    var digitalStampText = 'Bulawayo City Council\n' + formattedDate;

    // Insert the digital stamp into the large-box div
    $('#large-box').text(digitalStampText);

    // Style the digital stamp (optional)
    $('#large-box').css({
        'font-family': 'Courier New, monospace',
        'font-size': '14px',
        'text-align': 'center',
        'padding-top': '50%' // Center vertically within the box
    });
});



    </script>
</body>

</html>


                

                     