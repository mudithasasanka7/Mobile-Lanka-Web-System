<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

// Login Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Home Route (for authenticated users)
Route::middleware('auth')->group(function () {
    // User Home Page
    Route::get('/home', [UserController::class, 'index'])->name('home');
    
    // Admin Routes
    Route::prefix('admin')->group(function () {
        // Admin Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        // Product Routes
        Route::get('/products', [ProductController::class, 'index'])->name('admin.products'); // List products
        Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create'); // Create product form
        Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store'); // Store new product
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit'); // Edit product form
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('admin.products.update'); // Update product
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy'); // Delete product
        Route::get('/products', [ProductController::class, 'index'])->name('products.index'); // Change from 'admin.products' to 'products.index'

    });
    
    // User Product Routes (view individual product details)
    Route::get('/product/{id}', [UserController::class, 'showProductDetails'])->name('product.details');
});

// Default route (Login page for non-authenticated users)
Route::get('/', [AuthController::class, 'showLogin'])->name('login');

Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');

// Define the route for editing a product (edit)
Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');

// Define the route for updating a product (update)
Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');

// Define the route for deleting a product (delete)
Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

// Store a new product (POST request)
Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');