<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\AnnouncementController;

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
    return view('home');
});

Route::resource('agenda',AgendaController::class);
Route::resource('aspirasi',AspirasiController::class);
Route::resource('competition',CompetitionController::class);
Route::resource('announcement',AnnouncementController::class);
