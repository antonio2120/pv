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

<<<<<<< HEAD
Route::get('/ventas', 'VentasController@index');
=======
Route::get('/empleados', 'EmpleadosController@index');
>>>>>>> f8e662c81eb862627c680ca600468b4ef784e046
