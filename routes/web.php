<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', [AdminController::class,'index']);

Route::get('/home', [AdminController::class,'redirect']);

Route::post('/message', [MessageController::class,'message']);

Route::get('/particulier', [AdminController::class,'particulier']);

Route::get('/transpchauff', [AdminController::class,'transpchauff']);

Route::get('/mecanogarag', [AdminController::class,'mecanogarag']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
