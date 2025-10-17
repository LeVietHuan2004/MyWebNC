<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;


// Trang chủ
Route::get('/', function () {
    $products = \App\Models\Product::where('is_active', 1)->get(); 
    
    return view('welcome', compact('products'));
})->name('home');

// Auth
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return 'Chào mừng bạn đến Dashboard!';
})->middleware('auth')->name('dashboard');

// Admin
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Product resource
    Route::resource('products', ProductController::class);
});

Route::resource('products', App\Http\Controllers\ProductController::class)->names('products');

Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');