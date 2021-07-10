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
use GuzzleHttp\Client;

Route::get('/', function () {
    return view('login');
});
Route::get('/despacho', function () {
    return view('welcome');
});
/*
Route::get('/Movimientos', function () {
    return view('welcome');
});
*/
Route::get('/movimientos/tareas', 'tareasController@index');
Route::get('/movimientos/buscar', 'tareasController@buscar');
Route::get('/movimientos/diligencias', 'diligenciasController@index');
Route::get('/movimientos/buscardiligencia', 'diligenciasController@buscardiligencia');
Route::get('/movimientos/facturas', 'facturasController@index');
Route::get('/movimientos/cobranza', 'cobranzaController@index');
Route::get('/movimientos/tareas/nuevo', 'tareasController@nuevatarea');
Route::get('/movimientos/tareas/edit/{folio}', 'tareasController@modificartarea');
Route::get('/movimientos/diligencia/nuevo', 'diligenciasController@nuevo');
Route::get('/movimientos/diligencia/edit/{folio}', 'diligenciasController@modificar');
Route::get('/movimientos/buscarclientesdil', 'diligenciasController@buscaCliente');
Route::post('/movimientos/diligencia/save', 'diligenciasController@UpdateandInsert');
Route::get('/movimientos/tareas/user/{user}', 'tareasController@Getuser');
Route::post('/movimientos/tareas/save', 'tareasController@UpateInsert');
Route::get('/movimientos/diligencia/print/{folio}', 'diligenciasController@printpdf');

Route::get('/movimientos/agenda', 'agendaController@index');

Route::get('/movimientos/facturacion', function () {
    return view('tareas');
});

Route::get('/movimientos', function () {
    return view('tareas');
});

Route::get('/movimientos', function () {
    return view('tareas');
});

Route::get('/movimientos', function () {
    return view('horario');
});

Route::get('/movimientos', function () {
    return view('liquidacion');
});

Route::get('/movimientos', function () {
    return view('gasto');
});

Route::get('/herramientas', function () {
    return view('welcome');
});

Route::get('/configuracion', function () {
    return view('welcome');
});

Route::get('/otros', function () {
    return view('welcome');
});

