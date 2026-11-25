
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductInquiryController;
use Illuminate\Support\Facades\Route;

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes for logged-in users
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Browse Products
    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');

    // Product CRUD
    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('products.create');

    Route::post('/products', [ProductController::class, 'store'])
        ->name('products.store');

    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
        ->name('products.edit');

    Route::put('/products/{id}', [ProductController::class, 'update'])
        ->name('products.update');

    Route::delete('/products/{id}', [ProductController::class, 'destroy'])
        ->name('products.destroy');

    // Product Inquiry
    Route::post('/products/{product}/inquire', [ProductInquiryController::class, 'store'])
        ->name('products.inquire');

    // Seller Inquiries
    Route::get('/seller/inquiries', [ProductInquiryController::class, 'sellerInquiries'])
        ->name('seller.inquiries');

    // Buyer Inquiries
    Route::get('/my-inquiries', [ProductInquiryController::class, 'myInquiries'])
        ->name('my.inquiries');

    // Complete Inquiry
    Route::patch('/seller/inquiries/{inquiry}/complete', [ProductInquiryController::class, 'complete'])
        ->name('seller.inquiries.complete');

    // My Products
    Route::get('/my-products', [ProductController::class, 'myProducts'])
        ->name('my.products');
});

require __DIR__.'/auth.php';