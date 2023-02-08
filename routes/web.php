<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('dashboard',[DriverController::class,'dash'])->name('dashboard');
Auth::routes();
Route::resource('kendaraan',KendaraanController::class);
Route::resource('driver',DriverController::class);
Route::resource('pinjam',PeminjamanController::class);
Route::resource('persetujuan',PersetujuanController::class);

Route::middleware(['guest'])->group(function () {
    Route::post('masuk',[UserController::class,'masuk'])->name('masuk');
    Route::resource('user',UserController::class);  
});

Route::get('/',[KendaraanController::class,'welcome']);
Route::get('logout',[UserController::class,'logout'])->name('logout');
// Route::get('export',PeminjamanController::class,'export')->name('export');