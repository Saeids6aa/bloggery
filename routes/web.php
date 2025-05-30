<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\auth\LoginController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\tagsController;
use App\Http\Controllers\admin\usersControlleroller;
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

Route::middleware('auth:admin')->group(function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'admins'], function () {
            Route::get('/', [AdminController::class, 'index'])->name('admins');
            Route::get('/add_admin', [AdminController::class, 'create'])->name('add_admin');
            Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
            Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
            Route::put('admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
            Route::delete('admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
        });

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', [CategoriesController::class, 'index'])->name('categories');
            Route::get('/add_category', [CategoriesController::class, 'create'])->name('add_category');
            Route::post('/store', [CategoriesController::class, 'store'])->name('category.store');
            Route::get('category/edit/{id}', [CategoriesController::class, 'edit'])->name('category.edit');
            Route::put('category/update/{id}', [CategoriesController::class, 'update'])->name('category.update');
            Route::delete('category/delete/{id}', [CategoriesController::class, 'delete'])->name('category.delete');
        });
        Route::group(['prefix' => 'tags'], function () {
            Route::get('/', [tagsController::class, 'index'])->name('tags');
            Route::get('/add_tags', [tagsController::class, 'create'])->name('add_tags');
            Route::post('/store', [tagsController::class, 'store'])->name('tags.store');
            Route::get('tags/edit/{id}', [tagsController::class, 'edit'])->name('tags.edit');
            Route::put('tags/update/{id}', [tagsController::class, 'update'])->name('tags.update');
            Route::delete('tags/delete/{id}', [tagsController::class, 'delete'])->name('tags.delete');
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [usersControlleroller::class, 'index'])->name('users');
            Route::get('/add_users', [usersControlleroller::class, 'create'])->name('add_users');
            Route::post('/store', [usersControlleroller::class, 'store'])->name('users.store');
            Route::get('edit/{id}', [usersControlleroller::class, 'edit'])->name('users.edit');
            Route::put('update/{id}', [usersControlleroller::class, 'update'])->name('users.update');
            Route::delete('delete/{id}', [usersControlleroller::class, 'delete'])->name('users.delete');
        });

        Route::group(['prefix' => 'posts'], function () {
            Route::get('/', [PostController::class, 'index'])->name('posts');
            Route::get('/add_posts', [PostController::class, 'create'])->name('add_posts');
            Route::post('/store', [PostController::class, 'store'])->name('posts.store');
            Route::get('edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
            Route::put('update/{id}', [PostController::class, 'update'])->name('posts.update');
            Route::delete('delete/{id}', [PostController::class, 'delete'])->name('posts.delete');
            Route::get('show/{id}', [PostController::class, 'show'])->name('posts.show');
        });

        Route::group(['prefix' => 'about'], function () {
            Route::get('edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
            Route::put('update/{id}', [AboutController::class, 'update'])->name('about.update');
        });
    });
    Route::post('admin/login', [LoginController::class, 'store'])->name('admin.login.store');
  
    Route::post('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
});

Route::middleware('guest:admin')->group(function () {
    Route::get('admin/login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('admin/login', [LoginController::class, 'store'])->name('admin.login.store');
});
