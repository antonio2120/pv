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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/productos', 'ProductoController@index');
Route::get('/productosEliminar/{producto_id}', 'ProductoController@delete');

Route::get('/proveedores', 'ProveedoresController@index');

Route::get('/clientes', 'ClientesController@index');

Route::get('/ventas', 'VentasController@index');

Route::get('/empleados', 'EmpleadosController@index');

Route::get('/categorias', 'CategoriasController@index');

Route::get('/apartados', 'ApartadosController@index');
