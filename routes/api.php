<?php

use App\Http\Controllers\ComputersController;
use App\Http\Controllers\CustomersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('customers')->group(function () {
    Route::get('/search', [CustomersController::class, 'search']);
});


/**********Permet de Récupérer les ordinateurs**********/

Route::prefix('computers')->group(function () {
    Route::get('/get', [ComputersController::class, 'getComputers']);
    Route::post('/add', [ComputersController::class, 'addComputer']);
});



/*******************************************************/



/********************Les Attributions********************/

Route::prefix('attributions')->group(function () {
Route::get('/get/{id}', [ComputersController::class, 'getAttributions'])->where('id', '[0-9]+');
Route::post('/add', [ComputersController::class, 'addAttribution']);
});

/*******************************************************/
