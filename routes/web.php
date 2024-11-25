<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuaranteeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;


Route::post('/applicant/guarantees', [GuaranteeController::class, 'store'])->name('applicant.guarantees.store');
// Add this route definition
Route::get('/applicant/guarantees', [GuaranteeController::class, 'index'])->name('applicant.guarantees');

Route::get('/dashboard', [DashboardController::class, 'applicantDashboard'])->name('dashboard');
Route::get('/', [IndexController::class, 'index'])->name('index');

// Login and Registration Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route for the Applicant Panel
Route::middleware('auth')->group(function () {
    // Routes for creating, storing, editing, and deleting guarantees
    Route::post('/guarantees', [GuaranteeController::class, 'store'])->name('guarantees.store');
    Route::get('/guarantees', [GuaranteeController::class, 'index'])->name('guarantees.index'); // Fetch all guarantees
    Route::get('/guarantees/create', [GuaranteeController::class, 'create'])->name('guarantees.create');
    Route::get('/guarantees/{id}/edit', [GuaranteeController::class, 'edit'])->name('guarantees.edit');
    Route::put('/guarantees/{id}', [GuaranteeController::class, 'update'])->name('guarantees.update');
    Route::delete('/guarantees/{id}', [GuaranteeController::class, 'destroy'])->name('guarantees.destroy');

    // Route for Applicant's Dashboard
    Route::get('/dashboard', [DashboardController::class, 'applicantDashboard'])->name('dashboard.applicant');
});

// Route for the Reviewer Panel
Route::middleware(['auth', 'reviewer'])->group(function () {
    Route::get('/reviewer/dashboard', [DashboardController::class, 'reviewerDashboard'])->name('dashboard.reviewer');
    Route::get('/reviewer/guarantees', [GuaranteeController::class, 'reviewerIndex'])->name('reviewer.guarantees');
});

// Route for the Admin Panel
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard.admin');
    Route::get('/admin/guarantees', [GuaranteeController::class, 'adminIndex'])->name('admin.guarantees');
    
    // Fix for admin and user edit route conflict
    Route::get('/admin/guarantees/{id}/edit', [GuaranteeController::class, 'edit'])->name('admin.guarantees.edit');  // Admin specific edit route
    
    Route::delete('/admin/guarantees/{id}', [GuaranteeController::class, 'destroy'])->name('admin.guarantees.destroy');
    Route::get('/admin/users', [UserController::class, 'adminIndex'])->name('admin.users');
    Route::delete('/admin/users/{id}', [UserController::class, 'adminDestroy'])->name('users.destroy');
    Route::post('/admin/users', [UserController::class, 'adminStore'])->name('users.store');
    Route::put('/admin/users/{id}/edit', [UserController::class, 'adminUpdate'])->name('users.update');
});
