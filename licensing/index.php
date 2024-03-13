
<?php
// Get the current year
$currentYear = date("Y");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Licensing Certificate</title>
    <script src="https://unpkg.com/pdf-lib@1.18.0/dist/pdf-lib.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.1/print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <link rel="stylesheet" type="text/css" href="index.css">


   
</head>

<body>

     <nav class="navbar">
  <div class="dropdown">
    <button class="dropbtn">License Types</button>
    <div class="dropdown-content">
      <a href="index.php">Full Year Shop License</a>
      <a href="wholesale.php">Full Year Wholesale Licensse</a>
      <a href="retail.php"> Full Year Retail License</a>
    </div>
  </div>
  <button id="ExportButton" class="nav-btn">Export to PDF</button>
  <button id="saveButton" onclick="submitForm()" class="nav-btn">Save</button>
 
  <a href="index.php" class="nav-btn" >Home</a>
  <a href="records_login.php" class="nav-btn">Records</a>
  <a href="logout.php" class="nav-btn">Logout</a>
</nav>


   <main id="certificate">

     
      <form id="clientForm" action="save.php" method="post" >
          <div id="left-section">
                <h3 id="company-name">CITY OF BULAWAYO</h3>
                  <img id="company-logo" src="BCC-removebg-preview(4).png" alt="City Of Bulawayo">
                    <p class="shop-license">FULL YEAR'S SHOP LICENCE</p>

          <div id="account-field">
                      <label style="font-size:18px; "for="account_number">Account Number</label>
                        <input id="account_number" type="text" class="custom-font-input" required>
          </div>
                          <label for="tax-clearence" style="display:inline-block;">TIN No.</label>
                             <input type="text" id="tax-clearence" class="custom-font-input" name="tax-clearence" style="width: 90px; display:inline-block; margin-bottom:25px;"required><br>

                    


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
                        <td><input type="text" id="trade_type" name="trade_type" class="table-input" required></td>


                      </tr>
                
                      
                      </table>
                
                      
                      <label  for="condition_given">Conditions, restrictions or requirements or details of vending</label><br>
                      <input type="text" id="condition_given" class="custom-font-input" name="condition_given"required><br>
                      <input  type="text"  id="condition_given" class="custom-font-input"  name="condition_given"><br>
                      <input    type="text"  id="condition_given" class="custom-font-input" name="condition_given"><br>
                      <input    type="text"  id="condition_given" class="custom-font-input" name="condition_given"><br>

                      
                      <div id="large-box"></div>
                      <label id="dateStampLabel" for="large-box">Date Stamp</label><br>
                      


                      <label for="receipt_number">Receipt No.</label>
                      <input  type="text" id="receipt_number" name="receipt_number" class="custom-font-input" required><br>
                      <label for="range_number">Range  </label>
                      <input  type="text" id="range_number" name="range_number" class="custom-font-input" required><br>
                      <label for="">Floor Area   (m<sup>2</sup>)</label>
                      <input  type="text" id="floor_area" name="floor_area" class="custom-font-input"  required>
                      
                
                      



                    </div>

                  
                    <div id="right-section">
                  
                  
                      <label for="expiring_date" style="display:inline-block;">This license expires on 31st December </label>
                      <input type="text" id="expiring_date" class="custom-font-input" style="width: 60px; display:inline-block;" value="<?php echo $currentYear; ?>"><br>


                                
                      <label for="address_number">Address of Licensed Premises:</label><br>
                      <input type="text" id="address_number" class="custom-font-input" name="address_number" required><br>
                      <input type="text"id="address_number" class="custom-font-input" name="address_number"><br>
                      <input  type="text"id="address_number" class="custom-font-input" name="address_number"><br>
                      <input  type="text"id="address_number" class="custom-font-input" name="address_number"><br>



                        <p class="fees">1. Fees Tendered:</p><br> 
                    

                      <label style="margin-left: 30px;" for="license_fee">a) For Licence $</label>
                      <input  type="text" id="license_fee" class="custom-font-input"  name="license_fee" required><br>

                      
                      <label style="margin-left: 30px;" for="penalty_fee">b)  For Penalty $</label>
                      <input type="text" id="penalty_fee" class="custom-font-input" name="penalty_fee" required><br>
                        <p style="margin-left:38px;font-size: 15px;"><em>(If Applicable)</em></p><br>
                    

                    
                      <label style="margin-left: 30px;" for="any_other">c) Any Other</label>
                      <input  type="text" id="any_other" class="custom-font-input" name="any_other" required><br>


            
                      <label style="margin-top:30px;" for="name_of_license">1. Name of Licensee:</label><br>
                      <input type="text"  id="name_of_license" class="custom-font-input" name="name_of_license" required><br>
                      <input type="text" id="name_of_license" class="custom-font-input" name="name_of_license"><br>
                  

                    
                      <label for="trading_as" >Trading as :</label><br>
                      <input type="text"  id="trading_as" class="custom-font-input" name="trading_as" required><br>
                      <input type="text"  id="trading_as" class="custom-font-input"  name="trading_as"><br>
                      

                      <label for="name_of_owner" style=" margin-top:10px;">2. Name of Person in Actual and Effective<br> Control of the Business</p>
                      <input type="text"  id="name_of_owner" class="custom-font-input"  name="name_of_owner" required> 



                      
                      <p style="font-weight: bold; margin-top:8px;">................................................................................................</p>
                      <P style="margin-top: 0px; font-size: 16px; margin-bottom: 10px; ">FOR THE USE OF LICENSING AUTHORITY</P>

                    
                      <label for="issuing_office">Issuing Officer</label>
                      <input type="text"  id="issuing_office" class="custom-font-input"  name="issuing_office" >

                      <p style="text-align: center; font-size: 12px; font-weight: bold;" >Signature</p>
                    
                      <label for="licensing_office">Licensing Officer</label>
                      <input type="text"  id="licensing_office"class="custom-font-input"  name="licensing_office" >
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
    button.style.backgroundColor = '#51758a';
    button.style.color = 'white';
});
});
document.getElementById('ExportButton').addEventListener('click', function() {
var element = document.querySelector('#certificate');
var opt = {
margin: [0, 0],
  filename: 'report.pdf',
  image: { type: 'jpeg', quality: 0.98 },
  html2canvas: { scale: 3 },
  jsPDF: { 
      unit: 'in', 
      format: 'a4', 
      orientation: 'portrait', 
      backgroundColor: '#ffffff' 
  }
};

html2pdf().set(opt).from(element).save();
});

document.getElementById('submit').addEventListener('click', function() {
document.getElementById('clientForm').submit();
});

// Function to handle the PDF export process
//function exportToPDF() {
// Get the account number from the form
//const accountNumber = document.getElementById('account_number').value;

// Checking if the account number is valid
//if (!accountNumber) {
//alert('Please enter an account number before exporting.');
// return;
// }

// Definning the PDF export options
// const pdfOptions = {
//  margin: [0,  0],
// filename: 'Account_Number_' + accountNumber + '.pdf', // Use the account number in the filename
// image: { type: 'jpeg', quality:  0.98 },
//html2canvas: { scale:  3 },
//jsPDF: {  
  //  unit: 'in',  
  //  format: 'a4',  
  //  orientation: 'portrait',  
    //backgroundColor: '#ffffff'  
// }
//};

// Triggering the PDF export using html2pdf
//const element = document.querySelector('#certificate');
//html2pdf().set(pdfOptions).from(element).save();
//}

// Attach the exportToPDF function to the download button
//document.getElementById('ExportButton').addEventListener('click', exportToPDF);

$(document).ready(function() {
$('#floor_area').on('input', function() {
    var floor_area = parseInt($(this).val());
    var range_number;

    if (floor_area >=  0 && floor_area <=  30) {
        range_number =  1;
    } else if (floor_area >  30 && floor_area <=  100) {
        range_number =  2;
    } else if (floor_area >  100 && floor_area <=  250) {
        range_number =  3;
    } else if (floor_area >  250 && floor_area <=  500) {
        range_number =  4;
    } else if (floor_area >  500 && floor_area <=  1000) {
        range_number =  5;
    } else if (floor_area >  1000 && floor_area <=  2000) {
        range_number =  6;
    } else if (floor_area >  2000 && floor_area <=  4000) {
        range_number =  7;
    } else if (floor_area >  4000) {
        range_number =  8;
    } else {
        range_number = ''; // Clear the range number if the input is invalid
    }

    $('#range_number').val(range_number);
});
});

document.getElementById("saveButton").addEventListener("click", function() {
document.getElementById("clientForm").submit();
});










    </script>
    </body>

</html>