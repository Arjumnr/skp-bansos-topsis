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
                        Route::get('/{id}', 'CriteriaController@show')->name('kriteria.show');
                        Route::put('/{id}', 'CriteriaController@update')->name('kriteria.update');
                        Route::delete('/{id}', 'CriteriaController@destroy')->name('kriteria.destroy');
                  
                    }
                );

                // Route::get('/', [DashboardController::class, 'index'])->name('admin');
                // Route::get('/dashboard/{id}', [DashboardController::class, 'dataPengiriman'])->name('admin.dashboard');

            }
        );
});