<?php

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

Route::prefix('/article')->name('article')->controller(\App\Http\Controllers\ArticleController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::prefix('/admin')->name('admin')->group(function () {

});
