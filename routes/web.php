<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api;
use App\Http\Controllers\Admin;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OtherPagesController;
use App\Http\Controllers\ReadController;

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


Route::prefix('datas')->as("datas.")->group(function () {
    Route::resource('category', Api\CategoryController::class);
    Route::get('tranding', [Api\PostController::class, 'getTrandingNow'])->name('post.tranding');
    Route::get('top', [Api\PostController::class, 'getTop'])->name('post.top');
    Route::get('by-category/{category}', [Api\PostController::class, 'getByCategory'])->name('post.by-category');
    Route::get('by-category-2/{category}/{paginate}', [Api\PostController::class, 'getByCategory'])->name('post.by-category.2');
});

Route::prefix('admin')->as("admin.")->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('login', [Admin\LoginController::class, 'index'])->name('login');
        Route::post('login', [Admin\LoginController::class, 'proccess']);
    });
    Route::middleware(['auth'])->group(function () {

        Route::prefix('data')->as('data.')->group(function () {
            Route::get('dashboard', [Admin\DashboardController::class, 'get_data'])->name('dashboard');
            Route::get('dashboard-chart', [Admin\DashboardController::class, 'data_chart'])->name('dashboard.chart');
        });

        Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('category', Admin\CategoryController::class);
        Route::resource('post', Admin\PostController::class);
        Route::resource('user', Admin\UserController::class);

        Route::get('logout', [Admin\LoginController::class, 'logout'])->name('logout');
    });
});

Route::middleware(['visitor'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/author', [OtherPagesController::class, 'author'])->name('author');
    Route::get('/{url_post}', [ReadController::class, 'index'])->name('post');
});
