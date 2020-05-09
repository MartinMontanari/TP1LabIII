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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/','TimeDeposit\MakeTimeDepositController@execute')->name('newTimeDeposit');
Route::post('/finalBalanceCalculator','TimeDeposit\ReinvestTimeDepositController@execute')->name('finalDeposits');
Route::view('/finalBalance','finalBalance')->name('finalBalance');
Route::view('/finalDeposits', 'finalDeposits')->name('FinalTimeDeposits');
