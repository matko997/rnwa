<?php

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AirplaneController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\GoogleAuthController;
use App\Models\Airport;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/airports', AirportController::class);
    Route::resource('/airlines', AirlineController::class);
    Route::resource('/airplanes', AirplaneController::class);
    Route::resource('/flights', FlightController::class);
});

// routes/web.php

Route::get('login/google', [GoogleAuthController::class, 'redirectToProvider']);
Route::get('login/google/callback', [GoogleAuthController::class, 'handleProviderCallback']);
Route::get('/login', [GoogleAuthController::class, 'redirectToProvider'])->name('login');

