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
Route::get('/inicio', 'HomeController@index')->name('home');
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
    Route::get('reporte', 'UserChartController@usuarios')->name('reporte');
    Route::get('reporteRoles', 'UserChartController@roles')->name('reporteRoles');
});

Route::group([
    'prefix' => 'vehiculos',
    'as' => 'vehiculos.',
    'middleware' => ['auth']
], function () {
    Route::group(['middleware' => 'comprobarAdmin'], function () {
        Route::get('/', 'VehiculosController@index')->name('index');
    });
    Route::group(['middleware' => 'comprobarConductorAdmin'], function () {
        Route::get('/create', 'VehiculosController@create')->name('create');
        Route::post('/', 'VehiculosController@store')->name('store');
        Route::get('/{id}/edit', 'VehiculosController@edit')->name('edit');
        Route::put('/{id}', 'VehiculosController@update')->name('update');
        Route::patch('/{id}', 'VehiculosController@update')->name('update');
        Route::delete('/{id}', 'VehiculosController@destroy')->name('destroy');
    });
});

Route::group([
    'prefix' => 'facturas',
    'as' => 'facturas.',
    'middleware' => ['auth']
], function () {
    Route::get('reporte', 'UserChartController@facturas')->name('reporte');
    Route::group(['middleware' => 'comprobarAdmin'], function () {
        Route::get('/', 'FacturasController@index')->name('index');
        // Evita que se editen las facturas
        // Route::get('/{id}/edit', 'FacturasController@edit')->name('edit');
        // Route::put('/{id}', 'FacturasController@update')->name('update');
        // Route::patch('/{id}', 'FacturasController@update')->name('update');
        Route::delete('/{id}', 'FacturasController@destroy')->name('destroy');
    });

    // Permite a un pasajero solicitar un viaje

    Route::get('/create', 'FacturasController@create')->name('create');
    Route::get('/{factura}', 'FacturasController@show')->name('show');
    Route::post('/', 'FacturasController@store')->name('store');
});

Route::group([
    'prefix' => 'bitacoras',
    'as' => 'bitacoras.',
    'middleware' => ['auth', 'comprobarAdmin']
], function () {
    Route::get('/facturas', 'BitacorasController@facturas')->name('facturas');
    Route::get('/usuarios', 'BitacorasController@usuarios')->name('usuarios');
});


Auth::routes();
