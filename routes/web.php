<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JalanController;
use App\Http\Controllers\Admin\KasusController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\Dashboardcontroller as UserDashboardcontroller;
use Illuminate\Support\Facades\Route;

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

Route::get('/auth', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login_proses');

Route::group([
    'middleware' => 'auth'
], function(){

    Route::group([
        'prefix' => '/Admin'
    ], function(){
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/Dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::group([
            'prefix' => '/Kategori'
        ], function(){
            Route::get('/', [KategoriController::class, 'index'])->name('kategori');
            Route::post('/',[KategoriController::class, 'store']);
            Route::get('/{id}/edit',[KategoriController::class, 'edit'])->name('kategori.edit');
            Route::post('/Destroy/{id}',[KategoriController::class, 'destroy'])->name('kategori.destroy');
        });

        Route::group([
            'prefix' => '/Jalan'
        ], function(){
            Route::get('/', [JalanController::class, 'index'])->name('Jalan');
            Route::post('/',[JalanController::class, 'store']);
            Route::get('/{id}/edit',[JalanController::class, 'edit'])->name('Jalan.edit');
            Route::post('/Destroy/{id}',[JalanController::class, 'destroy'])->name('Jalan.destroy');
        });

        Route::group([
            'prefix' => '/Kasus'
        ], function(){
            Route::get('/', [KasusController::class, 'index'])->name('Kasus');
            Route::post('/',[KasusController::class, 'store']);
            Route::get('/{id}/edit',[KasusController::class, 'edit'])->name('Kasus.edit');
            Route::post('/Destroy/{id}',[KasusController::class, 'destroy'])->name('Kasus.destroy');
        });
    });

});

Route::get('/', [UserDashboardcontroller::class, 'index'])->name('home');
