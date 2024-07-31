<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LicensesController;
use App\Http\Controllers\AuthController;
use  App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;



// Public routes (accessible to everyone)
Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();
Route::post('/loginsubmit', [AuthController::class, 'login'])->name('login.submit');

// Routes for authenticated users
Route::middleware(['auth'])->group(function () {
 
    Route::get('/registration/form', [HomeController::class, 'Homepage'])->name('home');
    Route::get('/index', [HomeController::class, 'indexpage'])->name('index.home');
   // Route::get('/customer/search', [CustomerController::class, 'search'])->name('customer.search');
   // Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('/produce/shoplicense/{id}', [CustomerController::class, 'produce_license'])->name('customer.edit');
    Route::get('/search-customers', [HomeController::class, 'searchCustomer']);
Route::get('/search-licenses', [HomeController::class, 'searchLicense']);

Route::get('/customer/search', [CustomerController::class, 'search'])->name('customer.search');
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');


//saving registration information to customer database
Route::post('/license/store/customer-information', [CustomerController::class, 'storeLicenseData'])->name('store.clientsDetails');

// saving the payment information to licensing database
//Route::post('/save', [CustomerController::class, 'save'])->name('save');
Route::post('/license/store/customer-payments', [CustomerController::class, 'storePaymentsData'])->name('payment.store');
//Route::post('/check-outstanding-payments', [HomeController::class, 'checkOutstandingPayments'])->name('checkOutstandingPayments');

// Route to check outstanding payments
Route::get('/check-outstanding-payments', [PaymentController::class, 'checkOutstandingPayments'])->name('checkOutstandingPayments');

// Route to handle file uploads
Route::post('/upload-payment-proof', [PaymentController::class, 'uploadPaymentProof']);


    //logout route
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');


    
// User management routes
// Route to add a new user (store)
Route::post('/users', [UserController::class, 'store'])->name('users.save');

// Route to update a user (update)
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

// Route to delete a user (destroy)
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


});

// Routes for admin users
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/adminpage', [HomeController::class, 'AdminDashboard'])->name('admin.dashboard');     





    
});
