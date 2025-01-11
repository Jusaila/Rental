<?php

use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\RentalProductController;
use Illuminate\Support\Facades\Route;


Route::resource('rental_products', RentalProductController::class);
Route::resource('enquiries', EnquiryController::class);
