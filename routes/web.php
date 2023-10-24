<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\PaymentController;

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
    return redirect()->route('home');
})->name('/');

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginuser', [LoginController::class, 'login'])->name('loginuser');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registeruser', [AuthController::class, 'registeruser'])->name('registeruser');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/createuser', [UserController::class, 'createuser'])->name('user.createuser');
    Route::post('/edituser/{id}', [UserController::class, 'edituser'])->name('user.edituser');
    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
});

Route::middleware('auth')->prefix('credit')->group(function () {
    Route::get('/', [CreditController::class, 'index'])->name('credit');
    Route::get('/create', [CreditController::class, 'create'])->name('credit.create');
    Route::get('/edit/{id}', [CreditController::class, 'edit'])->name('credit.edit');
    Route::post('/createcredit', [CreditController::class, 'createcredit'])->name('credit.createcredit');
    Route::post('/editcredit/{id}', [CreditController::class, 'editcredit'])->name('credit.editcredit');
});

Route::middleware('auth')->prefix('payment')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])->name('payment');
    Route::get('/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::get('/edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::post('/createpayment', [PaymentController::class, 'createpayment'])->name('payment.createpayment');
    Route::post('/editpayment/{id}', [PaymentController::class, 'editpayment'])->name('payment.editpayment');
});
