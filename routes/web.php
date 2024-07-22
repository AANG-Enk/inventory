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

Route::middleware(['guest'])->group(function () {
    Route::prefix('login')->group(function () {
        Route::get('/',[App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login.index');
        Route::post('/',[App\Http\Controllers\Auth\LoginController::class, 'store'])->name('login.store');
    });
});

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);

    Route::resource('satuans', App\Http\Controllers\SatuanController::class);
    Route::resource('barangs', App\Http\Controllers\BarangController::class);
    Route::resource('barangsmasuk', App\Http\Controllers\BarangMasukController::class);
    Route::resource('barangskeluar', App\Http\Controllers\BarangKeluarController::class);
});
