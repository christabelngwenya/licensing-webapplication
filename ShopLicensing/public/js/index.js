

// Function to handle the PDF export process

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
$('#FloorArea').on('input', function() {
    var FloorArea= parseInt($(this).val());
    var ranRangeNumber;

    if (FloorArea >=  0 && FloorArea<=  30) {
        RangeNumber =  1;
    } else if (FloorArea >  30 && FloorArea<=  100) {
        RangeNumber =  2;
    } else if (FloorArea >  100 && FloorArea <=  250) {
        RangeNumber =  3;
    } else if (FloorArea >  250 && FloorArea<=  500) {
        RangeNumber =  4;
    } else if (FloorArea>  500 && FloorArea <=  1000) {
        RangeNumber =  5;
    } else if (FloorArea >  1000 && FloorArea<=  2000) {
        RangeNumber =  6;
    } else if (FloorArea >  2000 && FloorArea<=  4000) {
        RangeNumber =  7;
    } else if (floor_area >  4000) {
        RangeNumber =  8;
    } else {
        RangeNumber = ''; // Clear the range number if the input is invalid
    }

    $('#RangeNumber').val(RangeNumber);
});
});
 
//submit  form
 document.addEventListener('DOMContentLoaded', function(){  
    //getting the button element
    var saveButton = document.getElementById('saveButton');
  
    //get the form element
    var form = document.getElementById('clientForm');
  //adding click event listeners to the  button
  
  saveButton.addEventListener('click',function(event){
    // prevent the default  form submission
    event.preventDefault();
    //submit form
    form.submit();
  });
  });


  //classes selection options

  function handleSelection() {
    var selectElement = document.getElementById('classesSelect');
    var selectedOptions = Array.from(selectElement.selectedOptions).map(option => option.value);
    
    // Checking if more than one option is selected
    if (selectedOptions.length > 1) {
        // Add a comma after the last selected option
        selectedOptions[selectedOptions.length - 1] += ',';
    }
    
    // Update the input field with the selected values
    document.getElementById('classesSelect').value = selectedOptions.join('');
}


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    $(".input-container.icon2").click(function(){
        $(this).css("display","none");
        $(this).parent().find(".icon3").css("display","block");
        $(this).parent().find(".password-field").attr("type","text");
    });
    $(".input-container.icon3").click(function(){
        $(this).css("display","none");
        $(this).parent().find(".icon2").css("display","block");
        $(this).parent().find(".password-field").attr("type","password");
    });

    
      //classes selection options
    
      function toggleDropdown() {
        var dropdown = document.getElementById("dropdown");
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
        } else {
            dropdown.style.display = "block";
        }
    }

    document.addEventListener('click', function(event) {
        var isClickInside = document.getElementById('goodsInput').contains(event.target) || 
                            document.getElementById('dropdown').contains(event.target);
        if (!isClickInside) {
            document.getElementById('dropdown').style.display = 'none';
        }
    });

    var checkboxes = document.querySelectorAll('#dropdown input[type=checkbox]');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var selected = [];
            checkboxes.forEach(function(box) {
                if (box.checked) {
                    selected.push(box.value);
                }
            });
            document.getElementById('goodsInput').value = selected.join(', ');
        });
    });