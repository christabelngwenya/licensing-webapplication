
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- html2pdf.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

    <script src="javascript/html-pdf"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">


   
</head>

<body>

     <nav class="navbar">
  <div class="dropdown">
    <button class="dropbtn">License Types</button>
    <div class="dropdown-content">
      <a href="{{route('home')}}">Full Year Shop License</a>
      <a href="{{route('wholesale')}}">Full Year Wholesale Licensse</a>
      <a href="{{route('retail')}}"> Full Year Retail License</a>
    </div>
  </div>
  <button id="ExportButton" class="nav-btn">Export to PDF</button>
  <button id="saveButton"  class="nav-btn">Save</button>
 
  <a href="{{route('home')}}" class="nav-btn" >Home</a>
  <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();">
    Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

</nav>


<main id="certificate">
 
  <form id="clientForm" action="{{route('stores')}}" method="post" >
    @csrf
    @method('post')
        <div id="left-section">
           <h3 id="company-name">CITY OF BULAWAYO</h3>
             <img id="company-logo" src="{{ asset('images/BCC-removebg-preview(4).png') }}" alt="City Of Bulawayo">
               <p class="shop-license">FULL YEAR'S WHOLESALE LICENCE</p>

                <div id="account-field">
                    <label style="font-size:18px; "for="AccountNumber">Account Number</label>
                        <input id="AccountNumber" type="text" class="custom-font-input" required>
                  </div>
                          <label for="tax-clearence" style="display:inline-block;">TIN No.</label>
                             <input type="text" id="TaxClearence" class="custom-font-input" name="TaxClearence" style="width: 90px; display:inline-block; margin-bottom:25px;"required><br>


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
                              <td><input type="text" id="TradeType" name="TradeType" class="table-input" required></td>
                          </tr>
                          <tr>
                             <td>Hiring</td>
                              <td>Class(es)</td>
                            
                            </tr>
                          <tr>
                            <td>Vending Machine</td>
                            <td><input type="text" id="Vending" name="Vending" class="table-input" required></td>   
                           </tr>
                    
                      </table>
                    
                        
                          <label  for="condition_given">Conditions, restrictions or requirements or details of vending</label><br>
                           <input type="text" id="VendingDetails" class="custom-font-input" name="VendingDetails"required><br>
                             <input  type="text"  id="VendingDetails" class="custom-font-input"  name="VendingDetails"><br>
                             <input    type="text"  id="VendingDetails" class="custom-font-input" name="VendingDetails"><br>
                               <input    type="text"  id="VendingDetails" class="custom-font-input" name="VendingDetails"><br>
 
                           <div id="large-box"></div>
                           <label id="dateStampLabel" for="large-box">Date Stamp</label><br>
                          
                          <label for="receipt_number">Receipt No.</label>
                          <input  type="text" id="ReceiptNumber" name="ReceiptNumber" class="custom-font-input" required><br>
                          <label for="">Floor Area   (m<sup>2</sup>)</label>
                          <input  type="text" id="FloorArea" name="FloorArea" class="custom-font-input"  required><br>
                          <label for="RangeNumber">Range  </label>
                          <input  type="text" id="RangeNumber" name="RangeNumber" class="custom-font-input" required><br>
       
                          

        </div>
 
        <div id="right-section"> 
                          <label for="TheYear" style="display:inline-block;">This license expires on 31st December </label>
                           <input type="text" id="TheYear" name="TheYear" class="custom-font-input" style="width: 60px; display:inline-block;" value="<?php echo $currentYear; ?>"><br>
        
                          <label for="address_number">Address of Licensed Premises:</label><br>
                           <input type="text" id="AddressNumber" class="custom-font-input" name="AddressNumber" required><br>
                            <input type="text"id="AddressNumber" class="custom-font-input" name="AddressNumber"><br>
                             <input  type="text"id="AddressNumber" class="custom-font-input" name="AddressNumber"><br>
                               <input  type="text"id="AddressNumber" class="custom-font-input" name="AddressNumber"><br>


                          <p class="fees">1. Fees Tendered:</p><br> 
                           <label style="margin-left: 30px;" for="LicenseFee">a) For Licence $</label>
                            <input  type="text" id="LicenseFee" class="custom-font-input"  name="LicenseFee" required><br>
     
                          <label style="margin-left: 30px;" for="FineFee">b)  For Penalty $</label>
                           <input type="text" id="FineFee" class="custom-font-input" name="FineFee" required><br>
                            <p style="margin-left:38px;font-size: 15px;"><em>(If Applicable)</em></p><br>
                        
                          <label style="margin-left: 30px;" for="Other">c) Any Other</label>
                          <input  type="text" id="Other" class="custom-font-input" name="Other" required><br>

                          <label style="margin-top:30px;" for="LicenseName">1. Name of Licensee:</label><br>
                          <input type="text"  id="LicenseName" class="custom-font-input" name="LicenseName" required><br>
                          <input type="text" id="LicenseName" class="custom-font-input" name="LicenseName"><br>
                      
                          <label for="TradingAs" >Trading as :</label><br>
                          <input type="text"  id="TradingAs" class="custom-font-input" name="TradingAs" required><br>
                          <input type="text"  id="TradingAs" class="custom-font-input"  name="TradingAs"><br>
                        
                          <label for="OwnerName" style=" margin-top:10px;">2. Name of Person in Actual and Effective<br> Control of the Business</p>
                          <input type="text"  id="OwnerName" class="custom-font-input"  name="OwnerName" required> 
                          
                          <p style="font-weight: bold; margin-top:8px;">................................................................................................</p>
                          <P style="margin-top: 0px; font-size: 16px; margin-bottom: 10px; ">FOR THE USE OF LICENSING AUTHORITY</P>

                          <label for="Issuer">Issuing Officer</label>
                          <input type="text"  id="Issuer" class="custom-font-input"  name="Issuer" >

                          <p style="text-align: center; font-size: 12px; font-weight: bold;" >Signature</p>
                        
                          <label for="LicensingOfficer">Licensing Officer</label>
                          <input type="text"  id="LicensingOfficer"class="custom-font-input"  name="LicensingOfficer" >
                          <p style="text-align: center; font-size: 12px; font-weight: bold;">Signature</p>
                        </div>  
    
            </form>
           
      
      
    </main>
    <script src="{{asset('js/index.js')}}"></script>
    </body>

</html>