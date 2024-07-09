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
                Route::get('/', 'IndexController@index')->name('dashboard');
                // Route::get('/data', 'IndexController@data')->name('dashboard.data');
                
                Route::group(
                    ['prefix' => 'kriteria'],
                    function () {
                        Route::get('/', 'CriteriaController@index')->name('kriteria');
                        Route::get('/data', 'CriteriaController@paginated')->name('kriteria.data');
                        Route::post('/', 'CriteriaController@store')->name('kriteria.store');
                        Route::get('/kriteria/{id}', 'CriteriaController@show')->name('kriteria.show');
                        Route::put('/kriteria/{id}', 'CriteriaController@update')->name('kriteria.update');
                        Route::delete('/kriteria/{id}', 'CriteriaController@destroy')->name('kriteria.destroy');
                        // Route::get('/create', [CriteriaController::class, 'create'])->name('admin.kriteria.create');
                        // Route::post('/store', [CriteriaController::class, 'store'])->name('admin.kriteria.store');
                        // Route::get('/edit/{id}', [CriteriaController::class, 'edit'])->name('admin.kriteria.edit');
                        // Route::post('/update/{id}', [CriteriaController::class, 'update'])->name('admin.kriteria.update');
                        // Route::get('/delete/{id}', [CriteriaController::class, 'destroy'])->name('admin.kriteria.delete');
                    }
                );

                // Route::get('/', [DashboardController::class, 'index'])->name('admin');
                // Route::get('/dashboard/{id}', [DashboardController::class, 'dataPengiriman'])->name('admin.dashboard');

            }
        );
});