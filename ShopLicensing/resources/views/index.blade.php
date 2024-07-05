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
        .stamp-box {
            border: 2px dashed #000;
            width: 220px;
            height: 160px;
            margin: 20px auto;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .nav-buttons {
            text-align: right;
            margin-bottom: 20px;
        }
        .nav-buttons a {
            margin-left: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="nav-buttons">
        <a href="/home" class="btn btn-info"><i class="fas fa-home"></i> Home</a>
        <a href="/logout" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    <div class="certificate-container" id="licensing-certificate">
        <div class="certificate-header">
            <img src="{{asset('images/BCC-removebg-preview(4).png')}}" alt="City of Bulawayo">
            <h1>City Of Bulawayo</h1>
            <h2>Full Year Shop License</h2>
        </div>
        <div class="certificate-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="account_number">Account Number:</label>
                        <input type="text" class="form-control" id="account_number" name="account_number">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tin_number">TIN Number:</label>
                        <input type="text" class="form-control" id="tin_number" name="tin_number">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="class_type_goods">Class Type of Goods:</label>
                        <input type="text" class="form-control" id="class_type_goods" name="class_type_goods">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="vending_details">Details of Vending:</label>
                        <input type="text" class="form-control" id="vending_details" name="vending_details">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="floor_area">Floor Area:</label>
                        <input type="text" class="form-control" id="floor_area" name="floor_area">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="range_number">Range Number:</label>
                        <input type="text" class="form-control" id="range_number" name="range_number">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address_premises">Address of Premises:</label>
                        <input type="text" class="form-control" id="address_premises" name="address_premises">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="license_name">Name of License:</label>
                        <input type="text" class="form-control" id="license_name" name="license_name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="trading_as">Trading As:</label>
                        <input type="text" class="form-control" id="trading_as" name="trading_as">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="owner_name">Name of Owner:</label>
                        <input type="text" class="form-control" id="owner_name" name="owner_name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="receipt_number">Receipt Number:</label>
                        <input type="text" class="form-control" id="receipt_number" name="receipt_number">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="expiring_date">Expiring Date:</label>
                        <input type="text" class="form-control" id="expiring_date" name="expiring_date">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="license_fees">License Fees:</label>
                        <input type="text" class="form-control" id="license_fees" name="license_fees">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="penalty_fees">Penalty Fees:</label>
                        <input type="text" class="form-control" id="penalty_fees" name="penalty_fees">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="other_fees">Other Fees:</label>
                        <input type="text" class="form-control" id="other_fees" name="other_fees">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name_of_license">Name of License:</label>
                        <input type="text" class="form-control" id="name_of_license" name="name_of_license">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="issuer">Issuer of the License:</label>
                        <input type="text" class="form-control" id="issuer" name="issuer">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="licensing_officer">Licensing Officer:</label>
                        <input type="text" class="form-control" id="licensing_officer" name="licensing_officer">
                    </div>
                </div>
            </form>
        </div>
       
    
    </div>
    <div class="text-center">
        <button class="btn btn-primary mt-3" onclick="saveCertificate()">Save</button>
        <button id="ExportButton" class="btn btn-secondary mt-3">Export to PDF</button>
    </div>
</div>

<script>
    
    document.getElementById('ExportButton').addEventListener('click', function() {
        var element = document.querySelector('#licensing-certificate');
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

    // Function to save the certificate (for demonstration purposes)
    function saveCertificate() {
        alert('Certificate saved!');
    }




// Function to handle the PDF export process
//function exportToPDF() {
// Get the account number from the form
// const accountNumber = document.getElementById('account_number').value;
// Get the certificate content
//const certificateContent = document.getElementById('licensing-certificate').innerHTML;

// Check if the certificate content is empty
//if (certificateContent.trim() === '') {
//  alert('Please fill in the certificate content before exporting.');
//  return;
//}

// Create a new jsPDF instance
//const { jsPDF } = window.jspdf;
//const doc = new jsPDF();

// Add the certificate content to the PDF
//doc.fromHTML(certificateContent, 15, 15, {
//  width: 170
//});

// Save the PDF with the account number as the file name
//const fileName = `certificate_${accountNumber}.pdf`;
//doc.save(fileName);
//}

// Function to save the certificate (for demonstration purposes)


    document.addEventListener('DOMContentLoaded', function() {
        const params = new URLSearchParams(window.location.search);
        document.getElementById('account_number').value = params.get('account_number');
        document.getElementById('tin_number').value = params.get('tin_number');
        document.getElementById('class_type_goods').value = params.get('class_type_goods');
        document.getElementById('vending_details').value = params.get('vending_details');
        document.getElementById('floor_area').value = params.get('floor_area');
        document.getElementById('range_number')value = params.get('range_number');
        document.getElementById('address_premises').value = params.get('address_premises');
        document.getElementById('license_name').value = params.get('license_name');
        document.getElementById('trading_as').value = params.get('trading_as');
        document.getElementById('class_type_goods').value = params.get('owner_name');
       
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

</body>
</html>
