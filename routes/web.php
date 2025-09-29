<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
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

// site navigation
Route::get('/',[SiteController::class,'index']);
Route::get('/redirect',[SiteController::class,'index']);
Route::get('/products',[SiteController::class,'products']);
Route::post('/search',[SiteController::class,'search']);
Route::get('/search',[SiteController::class,'search']);
Route::get('/mycart',[SiteController::class,'showcart']);
Route::get('/site_admin',[SiteController::class,'admin']);

Route::post('/add_to_cart/{id}',[SiteController::class,'add_to_cart']);
Route::post('/remove_from_cart',[SiteController::class,'remove_from_cart']);
Route::post('/clearcart',[SiteController::class,'clear_cart']);

// admin actions
Route::get('/admin_new_product',[AdminController::class,'product']);
Route::get('/admin_list_products',[AdminController::class,'list_products']);
Route::get('/admin_edit_product/{id}',[AdminController::class,'ui_edit_product']);

Route::post('/add_product',[AdminController::class,'add_product']);
Route::post('/delete_product/{id}',[AdminController::class,'delete_product']);
Route::post('/edit_product/{id}',[AdminController::class,'edit_product']);