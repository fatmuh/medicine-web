<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KesehatanController;

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
    Route::get('/pesanan', 'pesanan')->name('order');
    Route::get('/invoice/{id}', 'invoice')->name('invoice');
    Route::get('/konsultasi', 'konsultasi')->name('konsultasi');
    Route::get('/kesehatan', 'kesehatan')->name('kesehatan');
    Route::get('/kesehatan/{slug}', 'kesehatanDetail')->name('kesehatan-detail');
});

Route::controller(ProfileController::class)->name('profile.')->group( function() {
    Route::get('/profile', 'index')->name('index');
    Route::put('/profile/update', 'update')->name('update');
    Route::get('/profile/change-password', 'changePassword')->name('changePassword');
    Route::post('/profile/change-password', 'changePasswordPost')->name('changePassword.post');
});

Route::controller(OrderController::class)->name('order.')->group( function() {
    Route::put('/store', 'store')->name('store');
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

    Route::controller(OrderController::class)->prefix('data/pesanan')->name('admin.pesanan.')->group( function() {
        Route::get('/', 'index')->name('index');
        Route::put('/update/{id}', 'update')->name('update');
        Route::put('/delete/{id}', 'delete')->name('delete');
    });

    Route::controller(UserController::class)->prefix('data/user')->name('admin.user.')->group( function() {
        Route::get('/', 'index')->name('index');
        Route::put('/update/{id}', 'update')->name('update');
        Route::put('/delete/{id}', 'delete')->name('delete');
    });

    Route::controller(ContactController::class)->prefix('data/konsultasi')->name('admin.konsultasi.')->group( function() {
        Route::get('/', 'index')->name('index');
        Route::put('/store', 'store')->name('store');
        Route::put('/update/{id}', 'update')->name('update');
        Route::put('/delete/{id}', 'delete')->name('delete');
    });

    Route::controller(KesehatanController::class)->prefix('data/kesehatan')->name('admin.kesehatan.')->group( function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'kesehatanCreate')->name('kesehatan-create');
        Route::post('/create', 'kesehatanPost')->name('kesehatan-post');
        Route::get('/edit/{slug}', 'kesehatanEdit')->name('kesehatan-edit');
        Route::post('/update/{slug}', 'update')->name('update');
        Route::put('/delete/{id}', 'delete')->name('delete');
    });
});


