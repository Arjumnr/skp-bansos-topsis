<?php

use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});
    

Route::get('/kriteria', [CriteriaController::class, 'index']);

Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login', [LoginController::class, 'login'])->name('loginPost');
Route::get('/auth/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(
    ['prefix' => '',  'namespace' => 'App\Http\Controllers',  'middleware' => ['auth']],
    function () {
        Route::group(
            ['prefix' => 'admin'],
            function () {
                Route::get('/', [IndexController::class, 'index'])->name('admin');

                // Route::get('/', [DashboardController::class, 'index'])->name('admin');
                // Route::get('/dashboard/{id}', [DashboardController::class, 'dataPengiriman'])->name('admin.dashboard');

            }
        );
});