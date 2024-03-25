<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;

/*Route Vendor*/
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
Route::resource('profile', VendorProfileController::class);


Route::resource('shop-profile', VendorShopProfileController::class);


