<?php

use Illuminate\Support\Facades\Route;
use App\Models\product;

Route::get('/', function () {
    return view('app');
});

use App\Http\Controllers\HomeController;

Route::get('/home', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\OrderController;

Route::resource('/orders', OrderController::class);

use App\Http\Controllers\ProductController;

Route::resource('/products', ProductController::class);

use App\Http\Controllers\SupplierController;

Route::resource('/suppliers', SupplierController::class);

use App\Http\Controllers\CompaniesController;

Route::resource('/companies', CompaniesController::class);

use App\Http\Controllers\TransactionController;

Route::resource('/transactions', TransactionController::class);

use App\Http\Controllers\UserController;

Route::resource('/users', UserController::class);


Route::get('barcode', [ProductController::class, 'GetProductBarcodes'])->name('products.barcode');

// Route::get('barcode', function () {

//     return Product::select('barcode')->get();
//     return view('products.barcode.index');
// })->name('products.barcode');
