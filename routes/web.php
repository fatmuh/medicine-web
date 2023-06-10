<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::controller(HomeController::class)->name('medicine.')->group( function() {
    Route::get('/', 'index')->name('index');
    Route::get('/obat', 'obat')->name('obat');
});

Route::middleware(['auth','ceklevel:Admin'])->group(function () {
    Route::controller(ObatController::class)->prefix('data/obat')->name('admin.obat.')->group( function() {
        Route::get('/', 'index')->name('index');
        Route::put('/store', 'store')->name('store');
        Route::put('/update/{id}', 'update')->name('update');
        Route::put('/delete/{id}', 'delete')->name('delete');
    });

    Route::controller(UserController::class)->prefix('data/user')->name('admin.user.')->group( function() {
        Route::get('/', 'index')->name('index');
        Route::put('/update/{id}', 'update')->name('update');
        Route::put('/delete/{id}', 'delete')->name('delete');
    });
});


