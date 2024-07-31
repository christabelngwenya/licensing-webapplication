<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop License Registration</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="search-bar">
            <input type="text" placeholder="Search for account...">
            <button type="submit" onclick="searchAccount()"><i class="fa fa-search"></i><!-- Search icon --></button>
        </div>
      
        <div id="search-results"></div>
        <form id="license-form" action="{{ route('store.clientsDetails') }}" method="POST">
            @csrf
            <h2>License Registration</h2>
            <label for="account_number">Account Number:</label>
            <input type="text" id="account_number" name="account_number" autocomplete="off" required>

            <label for="tin-number">TIN Number:</label>
            <input type="text" id="tin-number" name="tin_number" autocomplete="off" required>

            <label for="class-type_goods">Class Type of Goods:</label>
            <div class="dropdown">
                <input type="text" id="goodsInput" class="table-input" readonly onclick="toggleDropdown()">
                <div id="dropdown" class="dropdown-content">
                    <label><input type="checkbox" value="Class 1"> Class 1</label>
                    <label><input type="checkbox" value="Class 2"> Class 2</label>
                    <label><input type="checkbox" value="Class 3"> Class 3</label>
                    <label><input type="checkbox" value="Class 4"> Class 4</label>
                    <label><input type="checkbox" value="Class 4a"> Class 4a</label>
                    <label><input type="checkbox" value="Class 4b"> Class 4b</label>
                    <label><input type="checkbox" value="Class 5"> Class 5</label>
                    <label><input type="checkbox" value="Class 6"> Class 6</label>
                    <label><input type="checkbox" value="Class 7"> Class 7</label>
                    <label><input type="checkbox" value="Class 8"> Class 8</label>
                    <label><input type="checkbox" value="Class 9"> Class 9</label>
                </div>
            </div>
            <input type="hidden" name="class_type_goods" id="class_type_goods">

            <label for="vending_details">Details of Vending:</label>
            <input type="text" id="vending_details" name="vending_details" autocomplete="off" required>

            <label for="floor-area">Floor Area (m<sup>2</sup>):</label>
            <input type="text" id="FloorArea" name="floor_area" autocomplete="off" class="custom-font-input"><br>

            <label for="rangeNumber">Range:</label>
            <input type="text" id="RangeNumber" name="range_number" autocomplete="off" class="custom-font-input"><br>

            <label for="address_premises">Address of Premises:</label>
            <input type="text" id="AddressNumber" name="address_premises" autocomplete="off" required>

            <label for="license_name">Name of License:</label>
            <input type="text" id="license_name" name="license_name" autocomplete="off" required>

            <label for="trading_as">Trading As:</label>
            <input type="text" id="trading_as" name="trading_as" autocomplete="off" required>

            <label for="owner-name">Name of Owner:</label>
            <input type="text" id="owner_name" name="owner_name" autocomplete="off" required>
<div class="buttons">
    <button type="submit"><i class="fas fa-save"></i> Save</button>
    <button type="button" onclick="proceedToIndex()"><i class="fas fa-arrow-right"></i> Proceed</button>
</div>

        </form>
        <!-- Logout Button -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" id="logout-button">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </div>
    </div>

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("dropdown");
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
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
                document.getElementById('class_type_goods').value = selected.join(', ');
            });
        });

        document.getElementById('FloorArea').addEventListener('input', function() {
            var floorArea = parseFloat(this.value);
            var rangeNumber = '';

            if (floorArea >= 0 && floorArea <= 30) {
                rangeNumber = '1';
            } else if (floorArea > 30 && floorArea <= 100) {
                rangeNumber = '2';
            } else if (floorArea > 100 && floorArea <= 250) {
                rangeNumber = '3';
            } else if (floorArea > 250 && floorArea <= 500) {
                rangeNumber = '4';
            } else if (floorArea > 500 && floorArea <= 1000) {
                rangeNumber = '5';
            } else if (floorArea > 1000 && floorArea <= 2000) {
                rangeNumber = ' 6';
            } else if (floorArea > 2000 && floorArea <= 4000) {
                rangeNumber = '7';
            } else if (floorArea > 4000) {
                rangeNumber = '8';
            }

            document.getElementById('RangeNumber').value = rangeNumber;
        });

        function proceedToIndex() {
            window.location.href = "{{ route('index.home') }}";
        }

//search algorithm
function searchAccount() {
    var accountNumber = document.querySelector('.search-bar input').value;

    fetch(`/customer/search?account_number=${accountNumber}`)
        .then(response => response.json())
        .then(data => {
            var resultsTable = '<table class="table table-striped"><tr><th>Account Number</th><th>TIN Number</th><th>Class Type</th><th>Details of Vending</th><th>Floor Area</th><th>Range</th><th>Address</th><th>License Name</th><th>Trading As</th><th>Owner Name</th></tr>';
            if (data.length > 0) {
                data.forEach(customer => {
                    resultsTable += `<tr data-id="${customer.id}">
                        <td>${customer.account_number}</td>
                        <td>${customer.tin_number}</td>
                        <td>${customer.class_type_goods}</td>
                        <td>${customer.vending_details}</td>
                        <td>${customer.floor_area}</td>
                        <td>${customer.range_number}</td>
                        <td>${customer.address_premises}</td>
                        <td>${customer.license_name}</td>
                        <td>${customer.trading_as}</td>
                        <td>${customer.owner_name}</td>
                    </tr>`;
                });
            } else {
                resultsTable += '<tr><td colspan="10">No results found</td></tr>';
            }
            resultsTable += '</table>';

            document.getElementById('search-results').innerHTML = resultsTable;

            // Adding click event listeners to each row
            var rows = document.querySelectorAll('#search-results table tr[data-id]');
            rows.forEach(row => {
                row.addEventListener('click', function() {
                    var customerId = this.getAttribute('data-id');
                    window.location.href = `/produce/shoplicense/${customerId}`;
                });
            });
        })
        .catch(error => {
            console.error('There was a problem fetching the data', error);
        });
}


    </script>
</body>
</html>
