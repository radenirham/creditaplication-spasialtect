<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai')->middleware('auth');
Route::resource('home', HomeController::class);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginuser', [AuthController::class, 'loginuser'])->name('loginuser');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registeruser', [AuthController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');