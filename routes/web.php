<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'index']);
Route::get('/',[HomeController::class,'index']);

// admin actions
Route::get('/admin_new_product',[AdminController::class,'product']);
Route::get('/admin_list_products',[AdminController::class,'list_products']);

Route::post('/add_product',[AdminController::class,'add_product']);
Route::post('/delete_product/{id}',[AdminController::class,'delete_product']);