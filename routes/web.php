<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
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

Route::prefix('/tag')->name('tag.')->controller(TagController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}-{tag}', 'read')->name('read')->where([
        'slug' => '[0-9a-z\-]+',
        'tag' => '[0-9]+'
    ]);
    Route::get('/{tag}', 'redirect')->name('redirect')->where([
        'tag' => '[0-9]+'
    ]);
});

Route::prefix('/admin')->name('admin.')->controller(AdminController::class)
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'index')->name('overview');
        Route::get('/article', 'article')->name('article');
        Route::get('/article/new', 'new')->name('article.new');
        Route::post('/article/new', 'store');
        Route::get('/article/edit/{post}', 'edit')->name('article.edit')->where([
            'post'=>'[0-9]+'
        ]);
        Route::post('/article/edit/{post}', 'storeEdit')->where([
            'post'=>'[0-9]+'
        ]);
        Route::get('/article/delete/{post}', 'delete')->name('article.delete')->where([
            'post'=>'[0-9]+'
        ]);
        Route::get('/tags', 'tags')->name('tags');
        Route::get('/tags/new', 'newTag')->name('tags.new');
        Route::post('/tags/new', 'storeTag');
        Route::get('/tags/edit/{tag}', 'editTags')->name('tags.edit')->where([
            'post'=>'[0-9]+'
        ]);
        Route::post('/tags/edit/{tag}', 'storeEditTags')->where([
            'post'=>'[0-9]+'
        ]);
        Route::get('/tags/delete/{tag}', 'deleteTags')->name('tags.delete')->where([
            'post'=>'[0-9]+'
        ]);
    });

Route::prefix('/admin')->name('auth.')->controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'firstConnection');
    Route::post('/login','challenge');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
    Route::post('/', 'update')->middleware('auth');
});
