<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop License Certificate</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://unpkg.com/pdf-lib@1.18.0/dist/pdf-lib.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.1/print.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 

    <!-- html2pdf.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
   <style>
     /* PAGE ELEMENTS*/
 @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;0,700;1,400&display=swap');
 body {
     background-color: #f0f2f5;
 }
 .certificate-container {
     padding: 30px;
     margin: 20px auto;
     background-color: #fff;
     border-radius: 15px;
     max-width: 900px;
     box-shadow: 0 0 10px rgba(0,0,0,0.1);
 }
 .certificate-header {
     text-align: center;
     margin-bottom: 30px;
 }
 .certificate-header img {
     width: 100px;
     height: 100px;
 }
 .certificate-header h1, .certificate-header h2 {
     margin: 10px 0;
 }
 .certificate-body {
     margin-top: 30px;
 }
 .form-group label {
     font-weight: bold;
 }
 .certificate-footer {
     margin-top: 30px;
     text-align: center;
 }
 .certificate-footer p {
     margin: 0;
 }
 
 .nav-buttons {
     text-align: right;
     margin-bottom: 20px;
 }
 .nav-buttons a {
     margin-left: 10px;
 }

.form-control input{
     font-weight: bolde;
     font-size: 20px;
 }

 
/* Styles for the logout button */
#logout-button {
background-color: #e74c3c; 
color: white;
padding: 10px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
font-size: 16px;
display: flex;
align-items: center;
justify-content: center;

}

#logout-button i {
margin-right: 8px; /* Space between icon and text */
}

#logout-button:hover {
background-color: #c0392b; /* Darker red on hover */
}

   </style>
</head>
<body>

<div class="container">
    <div class="nav-buttons">
    <a href="{{ route('home') }}" class="btn btn-info"><i class="fas fa-home"></i> Home</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
       <button id="logout-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i> Logout
       </button>
    </div>
    <div class="certificate-container" id="licensing-certificate">
        <div class="certificate-header">
            <img src="{{asset('images/BCC-removebg-preview(4).png')}}" alt="City of Bulawayo">
            <h1>City Of Bulawayo</h1>
            <h2>Full Year Shop License</h2>
        </div>
        <div class="certificate-body">
        
        <form action="{{ route('payment.store') }}" id="clientForm" method="POST">
            @csrf
            @method('POST')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="account_number">Account Number:</label>
                        <input  style=" font-weight: bolder;  font-size: 20px;" type="text" class="form-control" id="account_number" name="account_number" value="{{ $customer->account_number }}" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tin_number">TIN Number:</label>
                        <input style=" font-weight: bolder;  font-size: 20px;" type="text" class="form-control" id="tin_number" name="tin_number" value="{{ $customer->tin_number }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="class_type_goods">Class Type of Goods:</label>
                        <input  style=" font-weight: bolder;  font-size: 20px;" type="text" class="form-control" id="class_type_goods" name="class_type_goods" value="{{ $customer->class_type_goods }}" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="vending_details">Details of Vending:</label>
                        <input  style=" font-weight: bolder;  font-size: 20px;" type="text" class="form-control" id="vending_details" name="vending_details" value="{{ $customer->vending_details }}" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="floor_area">Floor Area:</label>
                        <input  style=" font-weight: bolder;  font-size: 20px;" type="text" class="form-control" id="floor_area" name="floor_area" value="{{ $customer->floor_area }}" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="range_number">Range Number:</label>
                        <input  style=" font-weight: bolder;  font-size: 20px;" type="text" class="form-control" id="range_number" name="range_number" value="{{ $customer->range_number }}" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address_premises">Address of Premises:</label>
                        <input  style=" font-weight: bolder;  font-size: 20px;" type="text" class="form-control" id="address_premises" name="address_premises"  value="{{ $customer->address_premises }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="license_name">Name of License:</label>
                        <input  style=" font-weight: bolder;  font-size: 20px;"type="text" class="form-control" id="license_name" name="license_name" value="{{ $customer->license_name }}" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="trading_as">Trading As:</label>
                        <input  style=" font-weight: bolder;  font-size: 20px;"type="text" class="form-control" id="trading_as" name="trading_as" value="{{ $customer->trading_as }}" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="owner_name">Name of Owner:</label>
                        <input  style=" font-weight: bolder;  font-size: 20px;" type="text" class="form-control" id="owner_name" name="owner_name" value="{{ $customer->owner_name }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="receipt_number">Receipt Number:</label>
                        <input  style=" font-weight: bolder;  font-size: 20px;" type="text" class="form-control" id="receipt_number" name="receipt_number">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="expiring_date">This License expires on the 31st of December:</label>
                        <input  style=" font-weight: bolder;  font-size: 20px;" type="text" class="form-control" id="expiring_date" name="expiring_date">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="license_fees">License Fees:</label>
                        <input  style=" font-weight: bolder;  font-size:20px;" type="text" class="form-control" id="license_fees" name="license_fees">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="penalty_fees">Penalty Fees:</label>
                        <input  style=" font-weight: bolder;  font-size: 20px;" type="text" class="form-control" id="penalty_fees" name="penalty_fees">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="other_fees">Other Fees:</label>
                        <input  style=" font-weight: bolder;  font-size: 20px;"type="text" class="form-control" id="other_fees" name="other_fees">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name_of_license">Any Other Details</label>
                        <input  style=" font-weight: bolder;  font-size: 20px;" type="text" class="form-control" id="name_of_license" name="name_of_license">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="issuer">Issuer of the License:</label>
                        <input   style=" font-weight: bolder;  font-size: 20px;"type="text" class="form-control" id="issuer" name="issuer">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="licensing_officer">Licensing Officer:</label>
                        <input  style=" font-weight: bolder;  font-size: 20px;" type="text" class="form-control" id="licensing_officer" name="licensing_officer">
                    </div>
                </div>
            </form>
        </div>
       
    
    </div>
    <div class="text-center">
    <button class="btn btn-primary mt-3"  id="saveButton">Save </button>
        <button id="ExportButton" class="btn btn-secondary mt-3">Export to PDF</button>
    </div>
</div>

<script>
    
   
    document.getElementById('saveButton').addEventListener('click', function () {
        document.getElementById('clientForm').submit();
    });

    //exporting to pdf
  document.getElementById('ExportButton').addEventListener('click', function() {
    var accountNumber = document.getElementById('account_number').value.trim();
    var element = document.querySelector('#licensing-certificate');
    
    // making use of a default filename(license-certficate)  if accountNumber is empty
    var filename = accountNumber ? `account number -${accountNumber}.pdf` : 'license_certificate.pdf';
    
    var opt = {
        margin: [0, 0],
        filename: filename,
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


    document.getElementById('license-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    var accountNumber = document.getElementById('account_number').value;
    
    fetch('{{ route('checkOutstandingPayments') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            account_number: accountNumber
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'paid') {
            // Proceed with form submission
            this.submit();
        } else if (data.status === 'outstanding') {
            alert(`Outstanding balance detected!  first settle last year's  payment `);
        } else {
            alert('No payment records found for this account.');
        }
    })
    .catch(error => console.error('Error:', error));
});

</script>

</body>
</html>
