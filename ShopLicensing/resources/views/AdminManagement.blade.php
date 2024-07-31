<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Licensing Management </title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/all.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<body>

@if (Auth::check())
<header>
    <div class="header-content">
         <h1 class="company-name ">Licensing Management Dashboard</h1>
           <div class="profile-icons">
             <i class="fas fa-user-circle" id="profile-icon"></i> <!-- Profile icon -->
              <span class="tooltip-text">{{ Auth::user()->name }}</span>
           </div>
      </div>
</header>
@endif

<aside class="sidebar">
  <button class="user-management"><i class="fas fa-users"></i> User Management</button>
    <button class="record-management"><i class="fas fa-file-alt"></i> Licence Management</button>
    <button class="payment-management"><i class="fas fa-credit-card"></i> Payment Management</button>
     
     
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
          </form>
            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i> Logout
            </button>
</aside>

<main class="main-content" >

  <div>
        
     <div id="user-management">
       <button class="add-user-btn" onclick="openDialog()">Add User</button>
        </div>

        <div id="dialog-overlay"></div>

        <div id="user-dialog">
            <button class="close-btn" onclick="closeDialog()">×</button>
              <h2>Add New User</h2>

             <form id="add-user-form" method="POST" action="{{ route('users.save') }}">
               @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
    @csrf
    @method('post')
        <label for="name">Name:</label>
          <input type="text" id="name" name="name" autocomplete="off" required>

        <label for="email">Email:</label>
           <input type="email" id="email" name="email"  autocomplete="off"  required>

        <label for="password">Password:</label>
          <input type="password" id="password" name="password"  autocomplete="off"  required>

        <label for="is_admin">Is Admin:</label>
            <select id="is_admin" name="is_admin" required>
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>

            <button type="submit">Add User</button>
        </form>
    </div>

  <table class="user-table">
      <thead>
         <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
         </tr>
      </thead>
      <tbody>
        @if(isset($users) && $users->count() > 0)
          @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin }}</td>   
                    <td>      
                      <button class="update-btn" onclick="openUpdateDialog({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', {{ $user->is_admin }})">Update</button>
                      <button class="delete-btn" onclick="deleteUser({{ $user->id }})">Delete</button>
                    </td>
 
                </tr>
        @endforeach 
        @else
               <tr>
                   <td colspan="5">No users found</td>
                </tr>
        @endif
     </tbody>
    </tbody>
</table>


    <!-- Update User Modal -->
    <div id="dialog-overlay"></div>

<div id="update-dialog">
    <button class="close-btn" onclick="closeUpdateDialog()">×</button>
    <h2> Update User Details</h2>
    <form id="update-user-form" method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">

    @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@csrf
@method('put')
        <label for="update-name">Name:</label>
        <input type="text" id="update-name" name="name" autocomplete="off" required>

        <label for="update-email">Email:</label>
        <input type="email" id="update-email" name="email" autocomplete="off" required>

        <label for="update-is-admin">Is Admin:</label>
        <select id="update-is-admin" name="is_admin" required>
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
        <label for="update-password">Password:</label>
        <input type="password" id="update-password" name="password" autocomplete="off">

        <button type="submit">Update</button>
    </form>
</div>


 </div>
 

   
<!-- Div Container for Licensing Management -->
<div class="record-management" style="display: none;">
   <div class="main-title">
     <div class="container">
        <div class="search-bar">
           <input type="text" placeholder="Search for account...">
            <button type="submit" onclick="searchAccount()"><i class="fa fa-search"></i><!-- Search icon --></button>
        </div>
      

        <div id="customerTable">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Account Number</th>
                <th>TIN Number</th>
                <th>Class Type</th>
                <th>Details of Vending</th>
                <th>Floor Area</th>
                <th>Range</th>
                <th>Address</th>
                <th>License Name</th>
                <th>Trading As</th>
                <th>Owner Name</th>
                
            </tr>
        </thead>
        <tbody>
            @if(isset($customers) && $customers->count() > 0)
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->account_number }}</td>
                        <td>{{ $customer->tin_number }}</td>
                        <td>{{ $customer->class_type_goods }}</td>
                        <td>{{ $customer->vending_details }}</td>
                        <td>{{ $customer->floor_area }}</td>
                        <td>{{ $customer->range_number }}</td>
                        <td>{{ $customer->address_premises }}</td>
                        <td>{{ $customer->license_name }}</td>
                        <td>{{ $customer->trading_as }}</td>
                        <td>{{ $customer->owner_name }}</td>
>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="12">No customers found</td>
                </tr>
            @endif
        </tbody>
    </table>
    <!-- Update Customer Modal -->
<div id="edit-dialog" style="display:none;">
    <button class="close-btn" onclick="closeEditDialog()">×</button>
    <h2>Edit Customer Details</h2>
    <form id="edit-customer-form" method="POST" action="{{ route('customers.update', ['id' => ':id']) }}">
    @csrf
    @method('put')
        <input type="hidden" id="edit-customer-id" name="id">
        <label for="edit-account-number">Account Number:</label>
        <input type="text" id="edit-account-number" name="account_number" required>

        <label for="edit-tin-number">TIN Number:</label>
        <input type="text" id="edit-tin-number" name="tin_number" required>

        <label for="edit-class-type-goods">Class Type:</label>
        <input type="text" id="edit-class-type-goods" name="class_type_goods" required>

        <label for="edit-vending-details">Details of Vending:</label>
        <input type="text" id="edit-vending-details" name="vending_details" required>

        <label for="edit-floor-area">Floor Area:</label>
        <input type="text" id="edit-floor-area" name="floor_area" required>

        <label for="edit-range-number">Range:</label>
        <input type="text" id="edit-range-number" name="range_number" required>

        <label for="edit-address-premises">Address:</label>
        <input type="text" id="edit-address-premises" name="address_premises" required>

        <label for="edit-license-name">License Name:</label>
        <input type="text" id="edit-license-name" name="license_name" required>

        <label for="edit-trading-as">Trading As:</label>
        <input type="text" id="edit-trading-as" name="trading_as" required>

        <label for="edit-owner-name">Owner Name:</label>
        <input type="text" id="edit-owner-name" name="owner_name" required>

        <button type="submit">Update</button>
    </form>
</div>

</div>
<!-- Div Container for Outstanding Payments -->
<div id="payment-management" style="display: none;">
    <h2>Payment Management</h2>
    <div class="search-bar">
        <input type="text" id="search-account" placeholder="Enter account number...">
        <button type="button" onclick="checkOutstandingPayments()">Check Payments</button>
    </div>

    <div id="payment-status">
        <!-- Status message will be displayed here -->
    </div>

    <div id="upload-section" style="display: none;">
        <h3>Upload Payment Proof and Business Permission</h3>
        <form id="upload-form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="account_number" id="upload-account-number">

            <label for="payment_proof">Payment Proof:</label>
            <input type="file" id="payment_proof" name="payment_proof">

            <label for="business_permission_proof">Business Permission Proof:</label>
            <input type="file" id="business_permission_proof" name="business_permission_proof">

            <button type="submit">Upload</button>
        </form>
    </div>
</div>


  


</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  
  //TOOGLING  DISPLAY OF DIV CONTENTS UNDER THE MAIN SECTION

  document.addEventListener("DOMContentLoaded", function() {
   const sidebarOptions = document.querySelectorAll('.sidebar button');
     const mainSections = document.querySelectorAll('.main-content > div');

       sidebarOptions.forEach((option, index) => {
        option.addEventListener('click', function() {
      // Hide all main sections
          mainSections.forEach(section => section.style.display = 'none');

      // Show the selected main section
            mainSections[index].style.display = 'block';
    });
  });
});


//ADD USER MODAL DIALOGUE 
function openDialog() {
            document.getElementById('user-dialog').style.display = 'block';
            document.getElementById('dialog-overlay').style.display = 'block';
        }

        function closeDialog() {
            document.getElementById('user-dialog').style.display = 'none';
            document.getElementById('dialog-overlay').style.display = 'none';
        }


    //DEELETE USER MODAL DIALOGUE
   
    function deleteUser(userId) {
    if (confirm('Are you sure you want to delete this user?')) {
        fetch(`/users/${userId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.success);
                location.reload(); // Reloading the page to reflect the changes
            } else {
                alert(data.error);
            }
        })
        .catch(error => console.error('Error:', error));
    }
}
  
//update modal

    function openUpdateDialog(id, name, email, isAdmin) {
        document.getElementById('update-name').value = name;
        document.getElementById('update-email').value = email;
        document.getElementById('update-is-admin').value = isAdmin;
        document.getElementById('update-user-form').action = '/users/' + id; 
        document.getElementById('update-dialog').style.display = 'block';
        document.getElementById('dialog-overlay').style.display = 'block';
    }

    function closeUpdateDialog() {
        document.getElementById('update-dialog').style.display = 'none';
        document.getElementById('dialog-overlay').style.display = 'none';
    }


//LICENCING MANAGEMENT FUNCTIONS


        // Fetch data from the server and populate the tables
        fetch('/search-customers')
            .then(response => response.json())
            .then(data => {
                const customerTableBody = document.querySelector('#customerTable tbody');
                customerTableBody.innerHTML = '';

                data.forEach(customer => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${customer.id}</td>
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
                    `;
                    customerTableBody.appendChild(row);
                });
                
            });

    

       
//search algorithm
function searchAccount() {
    var accountNumber = document.querySelector('.search-bar input').value;

    fetch(`/customer/search?account_number=${accountNumber}`)
        .then(response => response.json())
        .then(data => {
            var customerTableBody = document.querySelector('#customerTable tbody');
            customerTableBody.innerHTML = '';

            if (data.length > 0) {
                data.forEach(customer => {
                    var row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${customer.id}</td>
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
                        <td>
                            <button class="edit-btn" onclick="openEditDialog(${customer.id}, '${customer.account_number}', '${customer.tin_number}', '${customer.class_type_goods}', '${customer.vending_details}', '${customer.floor_area}', '${customer.range_number}', '${customer.address_premises}', '${customer.license_name}', '${customer.trading_as}', '${customer.owner_name}')">Edit</button>
                        </td>
                    `;
                    customerTableBody.appendChild(row);
                });
            } else {
                customerTableBody.innerHTML = '<tr><td colspan="12">No customers found</td></tr>';
            }
        });
}


function openEditDialog(id, accountNumber, tinNumber, classTypeGoods, vendingDetails, floorArea, rangeNumber, addressPremises, licenseName, tradingAs, ownerName) {
    document.getElementById('edit-customer-id').value = id;
    document.getElementById('edit-account-number').value = accountNumber;
    document.getElementById('edit-tin-number').value = tinNumber;
    document.getElementById('edit-class-type-goods').value = classTypeGoods;
    document.getElementById('edit-vending-details').value = vendingDetails;
    document.getElementById('edit-floor-area').value = floorArea;
    document.getElementById('edit-range-number').value = rangeNumber;
    document.getElementById('edit-address-premises').value = addressPremises;
    document.getElementById('edit-license-name').value = licenseName;
    document.getElementById('edit-trading-as').value = tradingAs;
    document.getElementById('edit-owner-name').value = ownerName;

    document.getElementById('edit-customer-form').action = '/customers/' + id;
    document.getElementById('edit-dialog').style.display = 'block';
}

function closeEditDialog() {
    document.getElementById('edit-dialog').style.display = 'none';
}

document.addEventListener("DOMContentLoaded", function() {
    const sidebarOptions = document.querySelectorAll('.sidebar button');
    const mainSections = document.querySelectorAll('.main-content > div');

    sidebarOptions.forEach((option, index) => {
        option.addEventListener('click', function() {
            // Hide all main sections
            mainSections.forEach(section => section.style.display = 'none');

            // Show the selected main section
            mainSections[index].style.display = 'block';
        });
    });
});

function checkOutstandingPayments() {
    var accountNumber = document.getElementById('search-account').value;
    
    fetch(`/check-outstanding-payments?account_number=${accountNumber}`)
        .then(response => response.json())
        .then(data => {
            var paymentStatus = document.getElementById('payment-status');
            var uploadSection = document.getElementById('upload-section');
            document.getElementById('upload-account-number').value = accountNumber;

            if (data.outstanding_balance) {
                paymentStatus.innerHTML = `<p>Outstanding balance detected. Please settle it.</p>`;
                uploadSection.style.display = 'block';
            } else {
                paymentStatus.innerHTML = `<p>No outstanding balance. You are fully paid.</p>`;
                uploadSection.style.display = 'none';
            }
        });
}


</script>


</body>
</html>



