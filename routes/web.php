<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\auth\LoginController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\tagsController;
use App\Http\Controllers\admin\usersControlleroller;
use App\Http\Controllers\front\CommentController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\UserAuthentication;
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


        Route::group([
            'prefix' => 'profile',
        ], function () {
            Route::get('profile/{id}', [AdminController::class, 'profile'])->name('profile');
            Route::get('edit_profile/{id}', [AdminController::class, 'edit_profile'])->name('profile.edit');

            Route::put('profile/update/{id}', [AdminController::class, 'profile_updete'])->name('profile.update');
        });
        Route::group([
            'prefix' => 'admins',
            'middleware' => ['checkRoles:super_admin']
        ], function () {
            Route::get('/', [AdminController::class, 'index'])->name('admins');
            Route::get('/add_admin', [AdminController::class, 'create'])->name('add_admin');
            Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
            Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
            Route::put('admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
            Route::delete('admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
            Route::get('admin/show/{id}', [AdminController::class, 'show'])->name('show');
        });

        Route::group([
            'prefix' => 'categories',
            'middleware' => ['checkRoles:admin,super_admin']
        ], function () {
            Route::get('/', [CategoriesController::class, 'index'])->name('categories');
            Route::get('/add_category', [CategoriesController::class, 'create'])->name('add_category');
            Route::post('/store', [CategoriesController::class, 'store'])->name('category.store');
            Route::get('category/edit/{id}', [CategoriesController::class, 'edit'])->name('category.edit');
            Route::put('category/update/{id}', [CategoriesController::class, 'update'])->name('category.update');
            Route::delete('category/delete/{id}', [CategoriesController::class, 'delete'])->name('category.delete');
        });
        Route::group([
            'prefix' => 'tags',
            'middleware' => ['checkRoles:admin,super_admin']
        ], function () {
            Route::get('/', [tagsController::class, 'index'])->name('tags');
            Route::get('/add_tags', [tagsController::class, 'create'])->name('add_tags');
            Route::post('/store', [tagsController::class, 'store'])->name('tags.store');
            Route::get('tags/edit/{id}', [tagsController::class, 'edit'])->name('tags.edit');
            Route::put('tags/update/{id}', [tagsController::class, 'update'])->name('tags.update');
            Route::delete('tags/delete/{id}', [tagsController::class, 'delete'])->name('tags.delete');
        });

        Route::group([
            'prefix' => 'users',
            'middleware' => ['checkRoles:admin,super_admin']
        ], function () {
            Route::get('/', [usersControlleroller::class, 'index'])->name('users');
            Route::get('/add_users', [usersControlleroller::class, 'create'])->name('add_users');
            Route::post('/store', [usersControlleroller::class, 'store'])->name('users.store');
            Route::get('edit/{id}', [usersControlleroller::class, 'edit'])->name('users.edit');
            Route::put('update/{id}', [usersControlleroller::class, 'update'])->name('users.update');
            Route::delete('delete/{id}', [usersControlleroller::class, 'delete'])->name('users.delete');
        });

        Route::group([
            'prefix' => 'posts',
            'middleware' => ['checkRoles:editor,admin,super_admin']
        ], function () {
            Route::get('/', [PostController::class, 'index'])->name('posts');
            Route::get('/add_posts', [PostController::class, 'create'])->name('add_posts');
            Route::post('/store', [PostController::class, 'store'])->name('posts.store');
            Route::get('edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
            Route::put('update/{id}', [PostController::class, 'update'])->name('posts.update');
            Route::delete('delete/{id}', [PostController::class, 'delete'])->name('posts.delete');
            Route::get('show/{id}', [PostController::class, 'show'])->name('posts.show');
            Route::get('show_post_comment/{id}', [PostController::class, 'show_post_comment'])->name('posts.comment');
            Route::delete('delete_comment/{id}', [PostController::class, 'delete_comment'])->name('posts.delete_comment');
        });


        Route::group([
            'prefix' => 'about',
            'middleware' => ['checkRoles:super_admin']

        ], function () {
            Route::get('edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
            Route::put('update/{id}', [AboutController::class, 'update'])->name('about.update');
        });
        Route::group([
            'prefix' => 'setting',
            'middleware' => ['checkRoles:super_admin']
        ], function () {
            Route::get('edit/{id}', [SettingController::class, 'edit'])->name('setting.edit');
            Route::put('update/{id}', [SettingController::class, 'update'])->name('setting.update');
        });

        Route::group([
            'prefix' => 'contacts',
            'middleware' => ['checkRoles:super_admin,admin']
        ], function () {
            Route::get('/', [ContactController::class, 'getContactData'])->name('contacts');
            Route::delete('delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');
        });
    });


    Route::post('admin/login', [LoginController::class, 'store'])->name('admin.login.store');
    Route::post('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
});

Route::middleware('guest:admin')->group(function () {
    Route::get('admin/login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('admin/login', [LoginController::class, 'store'])->name('admin.login.store');
});


Route::group(['prefix' => 'home'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('app');
    Route::get('/show_post/{id}', [HomeController::class, 'show_post'])->name('post_details');
    Route::get('/show_all_posts', [HomeController::class, 'all_posts'])->name('all_posts');
    Route::get('/about_us', [HomeController::class, 'about_us'])->name('about_us');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::post('/send_contact', [HomeController::class, 'send_contact'])->name('send_contact');
    Route::get('/recent_posts', [HomeController::class, 'recent_posts'])->name('recent_posts');
    Route::get('/categories_posts/{id}', [HomeController::class, 'categories_posts'])->name('categories_posts');
    Route::get('/tags_posts/{id}', [HomeController::class, 'tags_posts'])->name('tags_posts');
    Route::post('user/logout', [UserAuthentication::class, 'logout'])->name('user.logout');
    Route::get('show_profile/{id}', [UserAuthentication::class, 'User_profile'])->name('User_profile');
    Route::put('update_profile/{id}', [UserAuthentication::class, 'update_profile'])->name('update_profile');
    Route::post('/user_comment', [CommentController::class, 'add_comment'])->name('add_comment');
});

Route::get('/register', [UserAuthentication::class, 'user_register'])->name('register');
Route::post('/store_user', [UserAuthentication::class, 'store_user'])->name('store_user');
Route::get('/user_login', [UserAuthentication::class, 'show_login_page'])->name('show_login');
Route::post('/user/login', [UserAuthentication::class, 'user_login'])->name('user_login.login.store');
