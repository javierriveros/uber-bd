<?php

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

Route::get('/', 'HomeController@index');
Route::get('/conductor', 'HomeController@conductor')
    ->middleware(['auth', 'comprobarConductor'])
    ->name('conductor');

Route::get('/administrador', 'HomeController@administrador')
    ->middleware(['auth', 'comprobarAdmin'])
    ->name('administrador');

Route::group([
    'prefix' => 'ubicaciones',
    'as' => 'ubicaciones.',
    'middleware' => ['auth', 'comprobarAdmin']
], function () {
    Route::get('/', 'UbicacionesController@index')->name('index');
    Route::get('/create', 'UbicacionesController@create')->name('create');
    Route::post('/', 'UbicacionesController@store')->name('store');
    Route::get('/{id}/edit', 'UbicacionesController@edit')->name('edit');
    Route::put('/{id}', 'UbicacionesController@update')->name('update');
    Route::patch('/{id}', 'UbicacionesController@update')->name('update');
    Route::delete('/{id}', 'UbicacionesController@destroy')->name('destroy');
});

Route::group([
    'prefix' => 'metodos_pago',
    'as' => 'metodos_pago.',
    'middleware' => ['auth', 'comprobarAdmin']
], function () {
    Route::get('/', 'MetodosPagoController@index')->name('index');
    Route::get('/create', 'MetodosPagoController@create')->name('create');
    Route::post('/', 'MetodosPagoController@store')->name('store');
    Route::get('/{id}/edit', 'MetodosPagoController@edit')->name('edit');
    Route::put('/{id}', 'MetodosPagoController@update')->name('update');
    Route::patch('/{id}', 'MetodosPagoController@update')->name('update');
    Route::delete('/{id}', 'MetodosPagoController@destroy')->name('destroy');
});

Route::group([
    'prefix' => 'tarifas',
    'as' => 'tarifas.',
    'middleware' => ['auth', 'comprobarAdmin']
], function () {
    Route::get('/', 'TarifasController@index')->name('index');
    Route::get('/create', 'TarifasController@create')->name('create');
    Route::post('/', 'TarifasController@store')->name('store');
    Route::get('/{id}/edit', 'TarifasController@edit')->name('edit');
    Route::put('/{id}', 'TarifasController@update')->name('update');
    Route::patch('/{id}', 'TarifasController@update')->name('update');
    Route::delete('/{id}', 'TarifasController@destroy')->name('destroy');
});

Route::group([
    'prefix' => 'usuarios',
    'as' => 'usuarios.',
    'middleware' => ['auth', 'comprobarAdmin']
], function () {
    Route::get('/', 'UsuariosController@index')->name('index');
    Route::get('/{id}/edit', 'UsuariosController@edit')->name('edit');
    Route::put('/{id}', 'UsuariosController@update')->name('update');
    Route::patch('/{id}', 'UsuariosController@update')->name('update');
    Route::delete('/{id}', 'UsuariosController@destroy')->name('destroy');
});


// Route::resources([
//     'facturas' => 'FacturasController',
//     'vehiculos' => 'VehiculosController',
//     'metodos-pago' => 'MetodosPagoController',
//     'ubicaciones' => 'UbicacionesController',
//     'tarifas' => 'TarifasController',
// ]);

Auth::routes();

Route::get('/inicio', 'HomeController@index')->name('home');
