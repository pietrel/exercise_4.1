<?php

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


Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/seat/check/{uuid}', [App\Http\Controllers\ReservationController::class, 'checkSeat'])->name('check');
Route::post('/seat/reserve', [App\Http\Controllers\ReservationController::class, 'reserveSeat'])->name('reserve');
Route::get('/trains', [App\Http\Controllers\TrainController::class, 'index'])->name('trains');
Route::get('/trains/{uuid}', [App\Http\Controllers\TrainController::class, 'get'])->name('train');
