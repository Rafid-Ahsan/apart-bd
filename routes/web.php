<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\Teamcontroller;
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
Route::get('/apartment/{id}', [ApartmentController::class, 'showSingleApartment']); // Route to Single Apartment

// All Apartments Routes
Route::get('/apartments', [ApartmentController::class, 'showAllApartments']);

// Apartment Rent Routes
Route::post('/rent/{user_id}/{apartment_id}', [RentController::class, 'store'])->middleware(['auth']);

// Apartment search Routes
Route::get('/search-apartment', [ApartmentController::class, 'search']);

//Profile Routes
Route::get('/profile/{user}', [ProfileController::class, 'show'])->middleware(['auth']);
Route::put('/profile/update/{user}', [ProfileController::class, 'update'])->middleware(['auth']);


// Admin Routes
Route::group(['middleware' => ['role:admin|moderator']], function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/inbox', [InboxController::class, 'index']);

    //team routes
    Route::get('/team', [Teamcontroller::class, 'index']);
    Route::put('/team/update/{user}', [Teamcontroller::class, 'update']);
    Route::get('/team/deleteRole/{user}', [Teamcontroller::class, 'delete']);
});

require __DIR__.'/auth.php';
