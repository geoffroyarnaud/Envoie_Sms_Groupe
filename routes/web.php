<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ParticulierController;
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

Route::get('/', [AdminController::class,'index']);

Route::get('/home', [AdminController::class,'redirect']);

Route::get('/particulier', [ParticulierController::class,'index'])->middleware('auth')->name('index.particulier');
Route::post('/particulier', [ParticulierController::class,'envoie'])->middleware('auth')->name('sendmessage.particulier');


Route::post('/message', [MessageController::class,'message']);

Route::get('/client_register', [AdminController::class,'client_register']);

Route::post('/enregistrement_cli', [AdminController::class,'enregistrement_cli']);

Route::get('/transpchauff', [AdminController::class,'transpchauff']);

Route::get('/mecanogarag', [AdminController::class,'mecanogarag']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
