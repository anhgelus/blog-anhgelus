<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
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
    return view('root');
})->name('root');

Route::prefix('/article')->name('article.')->controller(ArticleController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}-{id}', 'read')->name('read')->where([
            'slug' => '[0-9a-z\-]+',
            'id' => '[0-9]+'
        ]);
    Route::get('/{id}', 'redirect')->name('redirect')->where([
            'id' => '[0-9]+'
        ]);
});

Route::prefix('/admin')->name('admin.')->controller(AdminController::class)
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'index')->name('overview');
        Route::prefix('/article')->name('article')->group(function () {
            Route::get('/', 'article')->name('');
            Route::get('/new', 'new')->name('.new');
            Route::post('/new', 'store');
            Route::get('/edit/{post}', 'article')->name('.edit')->where([
                'post'=>'[0-9]+'
            ]);
            Route::get('/delete/{post}', 'article')->name('.delete')->where([
                'post'=>'[0-9]+'
            ]);
        });
        Route::get('/tags', 'index')->name('tags');
    });

Route::prefix('/admin')->name('auth.')->controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'firstConnection');
    Route::post('/login','challenge');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
    Route::post('/', 'update')->middleware('auth');
});
