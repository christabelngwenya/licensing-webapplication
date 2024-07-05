<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LicensesController;
use App\Http\Controllers\AuthController;
use  App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;



// Public routes (accessible to everyone)
Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();
Route::post('/loginsubmit', [AuthController::class, 'login'])->name('login.submit');

// Routes for authenticated users
Route::middleware(['auth'])->group(function () {
 
    Route::get('/home', [HomeController::class, 'Homepage'])->name('home');
    Route::get('/index', [HomeController::class, 'indexpage'])->name('index.home');
    Route::get('/wholesale', [HomeController::class, 'WholesaleOption'])->name('wholesale');
    Route::get('/retail', [HomeController::class, ' RetailOption'])->name('retail');
    Route::post('/licenses/store', [LicensesController::class, 'store'])->name('licenses.stores');
    Route::post('/license/store', [CustomerController::class, 'storeLicenseData'])->name('customer.store');
    Route::get('/customer/search', [CustomerController::class, 'search'])->name('customer.search');
    //retrieving all the data from database for customers
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');


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
    Route::post('/api/stats', [StatisticsController::class, 'getStats'])->name('Stats');





    
});
