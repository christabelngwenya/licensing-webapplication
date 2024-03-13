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









