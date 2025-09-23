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
Route::get('/product',[AdminController::class,'product']);

Route::post('/add_product',[AdminController::class,'add_product']);