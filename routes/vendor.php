<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;

/*Route Vendor*/
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
