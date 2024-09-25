<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

include_once 'admin.php';


Route::get('/login',[AuthController::class, 'login'])->name('member.login');
Route::post('/postLogin', [AuthController::class,'postLogin'])->name('member.postLogin');

Route::get('/register', [AuthController::class,'register'])->name('member.register');
Route::post('/postRegister', [AuthController::class,'postRegister'])->name('member.postRegister');

Route::get('/forgot-password', [AuthController::class,'forgot_password'])->name('member.forgot_password');
Route::post('/reset-password', [AuthController::class,'reset_password'])->name('member.reset_password');

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::middleware('auth.member')->group(function () {
    Route::get('/logout', [AuthController::class,'logout'])->name('member.logout');
});