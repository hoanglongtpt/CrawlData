<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\TransactionController;

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




Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'post_login'])->name('admin.postlogin');


Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/index', [AdminUserController::class, 'index'])->name('admin.index');
    Route::resource('/user', UserController::class)->parameters(['user' => 'id']);
    Route::resource('/member', MemberController::class)->parameters(['member' => 'id']);
    Route::resource('/transaction', TransactionController::class)->parameters(['transaction' => 'id']);
});


Route::get('/no-permission', function () {
    return "Bạn không có quyền truy cập vào trang này!";
})->name('no_permission');
