<?php

use App\Http\Controllers\AirlineControllerApi;
use App\Http\Controllers\FlightControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('flights', [FlightControllerApi::class, 'index']);
Route::get('flights/{id}', [FlightControllerApi::class, 'show']);
Route::post('flights', [FlightControllerApi::class, 'store']);
Route::put('flights/{id}', [FlightControllerApi::class, 'update']);
Route::delete('flights/{id}', [FlightControllerApi::class, 'destroy']);

Route::get('airlines', [AirlineControllerApi::class, 'index']);
Route::get('airlines/{id}', [AirlineControllerApi::class, 'show']);
Route::post('airlines', [AirlineControllerApi::class, 'store']);
Route::put('airlines/{id}', [AirlineControllerApi::class, 'update']);
Route::delete('airlines/{id}', [AirlineControllerApi::class, 'destroy']);
