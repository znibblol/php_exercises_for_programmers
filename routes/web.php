<?php

use App\Http\Controllers\TipCalculatorController;
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

Route::get('/tip_calculator', [TipCalculatorController::class, 'renderPage']);
Route::post('/tip_calculator', [TipCalculatorController::class, 'postCalculateTip']);
