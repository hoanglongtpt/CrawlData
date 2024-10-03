<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;

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


Route::get('/login', [AuthController::class, 'login'])->name('member.login');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('member.postLogin');

Route::get('/register', [AuthController::class, 'register'])->name('member.register');
Route::post('/postRegister', [AuthController::class, 'postRegister'])->name('member.postRegister');

Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('member.forgot_password');
Route::post('/reset-password', [AuthController::class, 'reset_password'])->name('member.reset_password');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');

Route::middleware('auth.member')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('member.logout');
    Route::post('/freepik', [HomeController::class, 'GetFreePik'])->name('download.freepik');
    Route::post('/motion-array', [HomeController::class, 'GetMotionArray'])->name('download.motion-array');
    Route::post('/envato', [HomeController::class, 'GetEnvato'])->name('download.envato');
    Route::post('/youtube', [HomeController::class, 'GetYoutube'])->name('download.youtube');
    Route::post('/artlist', [HomeController::class, 'GetArtlist'])->name('download.artlist');
    Route::post('/pikbest', [HomeController::class, 'GetPikbest'])->name('download.pikbest');
    Route::post('/tiktok', [HomeController::class, 'GetTiktok'])->name('download.tiktok');
});

Route::get('/login/google', [GoogleAuthController::class, 'redirect'])->name('member.google-auth');
Route::get('/login/google/callback', [GoogleAuthController::class, 'callbackGoogle'])->name('member.loginGoogleCallback');
