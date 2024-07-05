<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Admin Dashboard</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/all.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



<body>
@if (Auth::check())
<header>
    <div class="header-content">
            <h1 class="company-name ">Admin Dashboard</h1>
            <div class="profile-icons">
            <i class="fas fa-user-circle" id="profile-icon"></i> <!-- Profile icon -->
            <span class="tooltip-text">{{ Auth::user()->name }}</span>
        </div>
    </div>
</header>
@endif

<aside class="sidebar">
    <button class="home"><i class="fas fa-home"></i> Home</button>
    <button class="user-management"><i class="fas fa-users"></i> User Management</button>
    <button class="record-management"><i class="fas fa-file-alt"></i> Licence Management</button>

    <button class="readme"><i class="fas fa-book"></i> Readme</button>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<button onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="fas fa-sign-out-alt"></i> Logout
</button>
</aside>

<main class="main-content">
    <div class="home">
        <h2>Welcome to the Licensing Admin Dashboard </h2>
      
        
        <div class="shortcuts">
        <button id="viewActivitiesBtn"><i class="fas fa-eye"></i> View Activities</button>
        </div>

        
    </div>

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
          <th>Last Login</th>
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
                        <td>{{ $user->last_login_at ? $user->last_login_at->format('Y-m-d H:i:s') : 'Never' }}</td>
                    <td>
                    
    <button class="update-btn" onclick="openUpdateDialog({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', {{ $user->is_admin }})">Update</button>
      <button class="delete-btn" onclick="deleteUser({{ $user->id }})">Delete</button>

</td>

               
                    </tr>
                @endforeach
              
            @else
                <tr>
                    <td colspan="5">No users found.</td>
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
  <div>
    <input type="text" id="search-account" placeholder="Search Account...">
    <button onclick="searchAccount()">Search</button>
</div>

<div id="customer-details" >
     <!-- Table to display customer data -->
     <table>
            <thead>
                <tr>
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
                @foreach($users as $customer)
                <tr>
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
                </tr>
                @endforeach
            </tbody>
        </table>
</div>

<div id="license-details" >
    <table id="payments-table">
        <thead>
            <tr>
               <th>Account number</th>
                <th>Year</th>
                <th>receipt number</th>
                <th>licensing fee</th>
                <th>fine fee</th>
                <th>any other fee</th>
            </tr>
        </thead>
        <tbody>
            <!-- Payments data rows will be dynamically added here -->
        </tbody>
    </table>
</div>

   
  </div>
    <!-- Canvas Elements for Charts -->
    <canvas id="pieChart"></canvas>
    <canvas id="barGraph"></canvas>
</div>
 

  <div class="readme" style="display: none;">
    <h2>Shop Licensing System - Readme</h2>
    <p>The Shop Licensing System is designed to help  produce electronic shop licences</p>
    <h3>Functions and Features:</h3>
    <ul>
      <li>Manage and track all licences produced.</li>
      <li>View detailed information about each asset, including its ID, name of owner,serial number,contact details of the owner,their office number, category,and more.</li>
      <li>Add new assets to the registry, update existing asset details, and mark assets as active or inactive.</li>
      <li>Search and filter assets based on different criteria, making it easy to find specific licences.</li>
      <li>View recent activities to keep track of changes made  by users.</li>
      <li>Customize user permissions and access levels to ensure data security and control.</li>
    </ul>
  
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


//add user dialogue
function openDialog() {
            document.getElementById('user-dialog').style.display = 'block';
            document.getElementById('dialog-overlay').style.display = 'block';
        }

        function closeDialog() {
            document.getElementById('user-dialog').style.display = 'none';
            document.getElementById('dialog-overlay').style.display = 'none';
        }



//activities
$(document).ready(function() {
            $.ajax({
                url: '/api/stats',
                type: 'GET',
                success: function(response) {
                    var ctxPie = document.getElementById('pieChart').getContext('2d');
                    var myPieChart = new Chart(ctxPie, {
                        type: 'pie',
                        data: response.pieChartData,
                    });

                    var ctxBar = document.getElementById('barGraph').getContext('2d');
                    var myBarChart = new Chart(ctxBar, {
                        type: 'bar',
                        data: response.barChartData,
                    });
                }
            });
        });

    //delete dialogue
   
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


    // AJAX request to fetch and display customer data
function showCustomerDetails() {
    $.ajax({
        url: '/get-customers', // Laravel route to fetch customers
        method: 'GET',
        success: function(data) {
            $('#customer-table tbody').empty(); // Clearing previous data
            data.forEach(function(customer) {
                $('#customer-table tbody').append(`
                    <tr>
                        <td>${customer.name}</td>
                        <td>${customer.email}</td>
                        <td>${customer.phone}</td>
                        <td><button onclick="editCustomer(${customer.id})">Edit</button></td>
                    </tr>
                `);
            });
            $('#customer-details').show(); // Showing the customer details section
        },
        error: function(xhr, status, error) {
            console.error('Error fetching customers:', error);
        }
    });
}

// Function to handle editing a customer

// AJAX request to fetch and display payments

// AJAX request to search for accounts



</script>


</body>
</html>
