<?php

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AirportController;
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

Route::resource('/airports', AirportController::class);
Route::resource('/airlines', AirlineController::class);
