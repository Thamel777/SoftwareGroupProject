<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
Use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Common dashboard route if needed
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

//Admin routes
Route::middleware(['auth', 'admin'])->group(function (){    //'admin' from alias in app.php
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    //Routes for Admin profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');

    //register routes
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    
    // Employee management routes (accessible only by admins)
    /**get for retrieving, post for storing, put for updating */
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/employee/{employee}/update', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/employee/{employee}/destroy', [EmployeeController::class, 'destroy'])->name('employee.destroy');

});

//Employee routes
Route::middleware(['auth', 'employee'])->group(function () {    //'employee' from alias in app.php
    Route::get('/employee/dashboard', [EmployeeController::class, 'EmployeeDashboard'])->name('employee.dashboard');

    //profile routes for employee
    Route::get('/employee/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/employee/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/employee/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //product routes
    Route::get ('/product',[ProductController::class,'index'])->name('product.index');/*path where the view file is located*/
    Route::get ('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post ('/product',[ProductController::class,'store'])->name('product.store');
    Route::get ('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit'); //edit is the fuction
    Route::put ('/product/{product}/update',[ProductController::class,'update'])->name('product.update'); 
    Route::delete ('/product/{product}/delete',[ProductController::class,'delete'])->name('product.delete'); 

});

//Customer routes
Route::middleware(['auth', 'customer'])->group(function () {    //'customer' from alias in app.php
    Route::get('/customer', [CustomerController::class, 'customerdashboard'])->name('customer.dashboard');

    // Profile routes for customers
    //customer/login
    //need a Home for header
    Route::get('/customer/profile', [CustomerController::class, 'profile'])->name('customer.profile');
    Route::post('/customer/update-profile', [CustomerController::class, 'updateProfile'])->name('customer.updateProfile');
    Route::delete('/customer/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Publicly accessible routes
Route::get('/homepage', [CustomerController::class, 'index'])->name('customer.index');
     