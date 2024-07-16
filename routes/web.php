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

                Route::group(
                    ['prefix' => 'options'],
                    function () {
                        Route::get('/', 'OptionsController@index')->name('options');
                        Route::get('/data', 'OptionsController@paginated')->name('options.data');
                        Route::post('/', 'OptionsController@store')->name('options.store');
                        Route::get('/{id}', 'OptionsController@show')->name('options.show');
                        Route::put('/{id}', 'OptionsController@update')->name('options.update');
                        Route::delete('/{id}', 'OptionsController@destroy')->name('options.destroy');
                  
                    }
                );

                Route::group(
                    ['prefix' => 'warga'],
                    function () {
                        Route::get('/', 'WargaController@index')->name('warga');
                        Route::get('/data', 'WargaController@paginated')->name('warga.data');
                        Route::post('/', 'WargaController@store')->name('warga.store');
                        Route::get('/{id}', 'WargaController@show')->name('warga.show');
                        Route::put('/{id}', 'WargaController@update')->name('warga.update');
                        Route::delete('/{id}', 'WargaController@destroy')->name('warga.destroy');
                  
                    }
                );

                Route::group(
                    ['prefix' => 'rekapitulasi'],
                    function () {
                        Route::get('/', 'RekapitulasiController@index')->name('rekapitulasi');
                        Route::get('/data', 'RekapitulasiController@paginated')->name('rekapitulasi.data');
                        // Route::post('/', 'WargaController@store')->name('warga.store');
                        // Route::get('/{id}', 'WargaController@show')->name('warga.show');
                        // Route::put('/{id}', 'WargaController@update')->name('warga.update');
                        Route::delete('/{id}', 'RekapitulasiController@destroy')->name('rekapitulasi.destroy');
                  
                    }
                );

                Route::group(
                    ['prefix' => 'kusioner'],
                    function () {
                        Route::get('/', 'KusionerController@index')->name('kusioner');
                        Route::get('/data', 'KusionerController@dataForm')->name('kusioner.data');
                        Route::post('/', 'KusionerController@store')->name('warga.store');
                        // Route::get('/{id}', 'KusionerController@show')->name('warga.show');
                        // Route::put('/{id}', 'KusionerController@update')->name('warga.update');
                        // Route::delete('/{id}', 'KusionerController@destroy')->name('warga.destroy');
                  
                    }
                );

                // Route::get('/', [DashboardController::class, 'index'])->name('admin');
                // Route::get('/dashboard/{id}', [DashboardController::class, 'dataPengiriman'])->name('admin.dashboard');

            }
        );
});