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
Route::get('/login', function () {
    return view('login');
});
Route::get('/productos', 'ProductoController@index');
Route::get('/productosEliminar/{producto_id}', 'ProductoController@eliminar');
Route::get('/productosNuevo/', 'ProductoController@nuevo');
Route::post('/productosGuardar/', 'ProductoController@guardar');

Route::get('/proveedoresNuevo/', 'ProveedoresController@nuevo');
Route::get('/proveedoresEliminar/{proveedor_id}', 'ProveedoresController@eliminar');
Route::get('/proveedores', 'ProveedoresController@index');

Route::get('/clientes', 'ClientesController@index');
Route::get('/clientesNuevo/', 'ClientesController@nuevo');

Route::get('/ventas', 'VentasController@index');
Route::get('/ventasEliminar/{venta_id}', 'VentasController@delete');
Route::get('/ventasNuevo/', 'VentasController@nuevo');

Route::get('/empleados', 'EmpleadosController@index');
Route::get('/empleadosEliminar/{empleado_id}', 'EmpleadosController@delete');
Route::get('/empleadosNuevo/', 'EmpleadosController@nuevo');
Route::post('/empleadosGuardar/', 'EmpleadosController@guardar');

Route::get('/categorias', 'CategoriaController@index');
Route::get('/categoriasEliminar/{categoria_id}', 'CategoriaController@eliminar');
Route::get('/categoriasNuevo/', 'CategoriaController@nuevo');

Route::get('/apartados', 'ApartadoController@index');
Route::get('/apartadosEliminar/{apartado_id}', 'ApartadoController@eliminar');
Route::get('/apartadosNuevo/', 'ApartadoController@nuevo');
Route::post('/apartadosGuardar/', 'ApartadoController@guardar');

Route::get('/aparece', 'ApareceController@index');
Route::get('/apareceEliminar/{aparece_id}','ApareceController@eliminar');
Route::get('/apareceNuevo/','ApareceController@nuevo');

Route::get('/compras', 'ComprasController@index');
