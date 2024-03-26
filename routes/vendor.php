<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;

/*Route Vendor*/
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
Route::resource('profile', VendorProfileController::class);


Route::resource('shop-profile', VendorShopProfileController::class);
/* Route Vendor Product */
Route::get('product/get-subcategory', [VendorProductController::class, 'getSubCategory'])->name('product.get-subcategory');
Route::get('product/get-childcategory', [VendorProductController::class, 'getChildCategory'])->name('product.get-childcategory');
Route::put('product/change-status', [VendorProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('product', VendorProductController::class);

Route::resource('product-image-gallery', VendorProductImageGalleryController::class);


