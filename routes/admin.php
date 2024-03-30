<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\SellerProductsController;
use App\Http\Controllers\Backend\FlashSaleController;

/*Router Admin*/
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');

/* Route Slider */
Route::resource('slider', SliderController::class);

/* Route Category */
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);

/* Route SubCategory */
Route::put('subcategory/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
Route::resource('sub-category', SubCategoryController::class);

/* Route ChildCategory */
Route::put('childcategory/change-status', [ChildCategoryController::class, 'changeStatus'])->name('child-category.change-status');
Route::get('get-subcategory', [ChildCategoryController::class, 'getSubCategory'])->name('get-subcategory');
Route::resource('child-category', ChildCategoryController::class);

/* Route Brand */
Route::put('brand/change-isfetured', [BrandController::class, 'changeIsfetured'])->name('brand.change-isfetured');
Route::put('brand/change-status', [BrandController::class, 'changeStatus'])->name('brand.change-status');
Route::resource('brand', BrandController::class);

/* Route Vendor-Profile */
Route::resource('vendor-profile', AdminVendorProfileController::class);

/* Route Product*/
Route::get('product/get-subcategory', [ProductController::class, 'getSubCategory'])->name('product.get-subcategory');
Route::get('product/get-childcategory', [ProductController::class, 'getChildCategory'])->name('product.get-childcategory');
Route::put('product/change-status', [ProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('product', ProductController::class);
/* Product-image-gallery */
Route::resource('product-image-gallery', ProductImageGalleryController::class);

/* Produc-varian */
Route::put('product-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('product-variant.change-status');
Route::resource('product-variant', ProductVariantController::class);
/* Produc-varian-item */
Route::get('product-variant-item/{productId}/{variantId}', [ProductVariantItemController::class, 'index'])->name('product-variant-item.index');
Route::get('product-variant-item/create/{productId}/{variantId}', [ProductVariantItemController::class, 'create'])->name('product-variant-item.create');
Route::post('product-variant-item', [ProductVariantItemController::class, 'store'])->name('product-variant-item.store');
Route::get('product-variant-item-edit/{variantItemId}', [ProductVariantItemController::class, 'edit'])->name('product-variant-item.edit');
Route::put('product-variant-item-update/{variantItemId}', [ProductVariantItemController::class, 'update'])->name('product-variant-item.update');
Route::delete('product-variant-item/{variantItemId}', [ProductVariantItemController::class, 'destroy'])->name('product-variant-item.destroy');

Route::get('seller-product', [SellerProductsController::class, 'index'])->name('seller.product.index');
Route::get('seller-pending-product', [SellerProductsController::class, 'sellerPending'])->name('seller.pending.product.index');
Route::put('change-approve-status', [SellerProductsController::class, 'changeApproveStatus'])->name('change-approve-status');

/* Route Flash Sell */
Route::get('flash-sell', [FlashSaleController::class, 'index'])->name('flash-sell.index');
