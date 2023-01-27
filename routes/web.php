<?php

use App\Http\Controllers\TipCalculatorController;
use App\Http\Controllers\CountingTheNumberOfCharactersController;
use App\Http\Controllers\SimpleMathController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Tip calculator
Route::get('/tip_calculator', [TipCalculatorController::class, 'renderPage']);
Route::post('/tip_calculator', [TipCalculatorController::class, 'postCalculateTip']);

// Character counter
Route::get('/numofchars', [CountingTheNumberOfCharactersController::class, 'renderPage']);
Route::post('/numofchars', [CountingTheNumberOfCharactersController::class, 'postRequest']);

// Simple Math
Route::get('/simplemath', [SimpleMathController::class, 'renderPage']);
Route::post('/simplemath', [SimpleMathController::class, 'postRequest']);
