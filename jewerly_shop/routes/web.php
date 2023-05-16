<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BuyersController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/types', [TypesController::class, 'Feeling'])->name('types');

Route::get('/products', [ProductsController::class, 'Feeling'])->name('products');

Route::get('/orders', [OrdersController::class, 'Feeling'])->name('orders');

Route::get('/buyers', [BuyersController::class, 'Feeling'])->name('buyers');

Route::get('/create', [Controller::class, 'Create'])->name('create');

Route::post('/create', [Controller::class, 'Save']);

Route::get('/update', [Controller::class, 'Update'])->name('update');

Route::post('/update', [Controller::class, 'Save']);

Route::post('/delete', [Controller::class, 'Delete'])->name('delete');

Route::post('/discount', [ProductsController::class, 'Discount'])->name('discount');