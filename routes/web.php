<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Common Resource Routes:
// 1. index - show all listings
// 2. show - show a single listing
// 3. create - show form for creating new listing
// 4. store - store new listing
// 5. destroy - delete a listing
// 6. update - update a listing
// 7. edit - show form for editing



// All Listing
Route::get('/', [ListingController::class, 'index'])->name('home');

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->name('create');

// Store New Listing
Route::post('/listings', [ListingController::class, 'store']);

// show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// update listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('single.listing');

// Show register/create form 
Route::get('/register', [UserController::class, 'create']);
