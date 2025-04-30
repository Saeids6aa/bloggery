<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    //admins routes
    Route::group(['prefix' => 'admins'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admins');
        Route::get('/add_admin', [AdminController::class, 'create'])->name('add_admin');
        Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    });
});
