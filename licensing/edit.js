<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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






            

                 