<?php

use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Front\HomePageController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/


Route::prefix('admin')->group(function () {

    Route::middleware(['IsLogin'])->controller(Dashboard::class)->group(function () {
        Route::get('/panel', 'index')->name('dashboard');
    });
    Route::controller(AuthController::class)->group(function () {
        Route::get('/logout','logout')->name('logout');
    });
    Route::middleware(['IsLogout'])->controller(AuthController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'loginpost')->name('loginpost');
    });
    Route::controller(ArticleController::class)->group(function () {
        Route::get('/blogs','index')->name('blogs');
        Route::get('/blogs/create','create')->name('create_blog');
        Route::post('/blogs/store','store')->name('store_blog');
    });
});




/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/


Route::controller(HomePageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactpost')->name('contactpost');
    Route::get('/category-name/{category}', 'categoryList')->name('categoryList');
    Route::get('/{category}/{slug}', 'single')->name('single');
    Route::get('/{slug}', 'page')->name('page');
});




