<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;

// redirect to login page
Route::redirect('/', '/login');

// disabled routes
Auth::routes([
  'register' => false, // Register Routes...
  'reset' => false, // Reset Password Routes...
  'verify' => false, // Email Verification Routes...

]);

// admin routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('company', CompanyController::class);
    Route::resource('employee', EmployeeController::class);
});
