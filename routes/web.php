<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;


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

Route::get('/', [ApartmentController::class, 'welcome']);

Route::get('logout', function() {
    Auth::logout();

    return redirect('/');
});

// Apartment Routes
Route::get('/dashboard/{id}', [ApartmentController::class, 'show'])->middleware(['auth'])->name('dashboard');
Route::get('/add-property', [ApartmentController::class, 'index'])->middleware(['auth']);
Route::post('/apartment/{id}', [ApartmentController::class, 'store'])->middleware(['auth']);
Route::get('/apartment/{id}', [ApartmentController::class, 'showSingleApartment'])->middleware(['auth']); // Route to Single Apartment

// All Apartments Routes
Route::get('/apartments', [ApartmentController::class, 'showAllApartments']);

// Apartment Rent Order Routes
Route::post('/order/{user_id}/{apartment_id}', [OrderController::class, 'store'])->middleware(['auth']);

// Apartment search Routes
Route::get('/search-apartment', [ApartmentController::class, 'search']);

// Admin Routes
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index']);
});

require __DIR__.'/auth.php';
