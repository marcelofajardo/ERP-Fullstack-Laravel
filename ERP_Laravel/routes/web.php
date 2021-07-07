<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});


//recuperado del proyecto API anterior
//CRUD de Client con middleware de autenticación

Route::middleware(['auth', 'admin.verify'])->group(function () {
    // Route::get('/users/clients', [ClientController::class, 'index']);
    // Route::post('/users/clients', [ClientController::class, 'store']);
    // Route::get('/users/clients/{id}', [ClientController::class, 'show']);
    // Route::put('/users/clients/{id}', [ClientController::class, 'update']);
    // Route::delete('/users/clients/{id}', [ClientController::class, 'destroy']);
    Route::resource('users/clients', ClientController::class)->names('clients');
    Route::resource('users/employees', EmployeeController::class)->names('employees');
});


//CRUD de Employee con middleware de autenticación

Route::middleware(['auth', 'admin.verify'])->group(function () {
    Route::get('/users/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::post('/users/employees', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/users/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/users/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::delete('/users/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
});


//CRUD de Product con middleware de autenticación excepto get products

Route::get('/products', [ProductController::class, 'publicIndex'])->name('product.publicIndex');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
Route::middleware(['auth', 'admin.verify'])->group(function () {
    Route::get('/admin/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create/product', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products', [ProductController::class, 'store'])->name('product.store');
    Route::get('/edit/product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});
