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
Route::get('/productos/{buscar}', 'ProductoController@buscar');
Route::get('/productosEliminar/{producto_id}', 'ProductoController@eliminar');
Route::get('/productosNuevo/', 'ProductoController@nuevo');
Route::post('/productosGuardar/', 'ProductoController@guardar');
Route::get('/productosEditar/{producto_id}', 'ProductoController@editar');
Route::get('/productosPDF/{buscar}','ProductoController@downloadPDF');

Route::get('/proveedoresNuevo/', 'ProveedoresController@nuevo');
Route::get('/proveedoresEliminar/{proveedor_id}', 'ProveedoresController@eliminar');
Route::get('/proveedores', 'ProveedoresController@index');
Route::post('/proveedoresGuardar/', 'ProveedoresController@guardar');
Route::get('/proveedoresEditar/{proveedor_id}', 'ProveedoresController@editar');
Route::get('/proveedores/{buscar}', 'ProveedoresController@buscar');
Route::get('/proveedoresPDF/','ProveedoresController@downloadPDF');
Route::get('/proveedoresPDF/{buscar}','ProveedoresController@downloadPDF');
Route::match(['get', 'post'], '/proveedoresImagen/', 'ProveedoresController@Image');
Route::delete('/proveedoresImagen/{filename}', 'ProveedoresController@deleteImage');

Route::get('/clientes', 'ClientesController@index');
Route::get('/clientesEliminar/{cliente_id}', 'ClientesController@eliminar');
Route::get('/clientesNuevo/', 'ClientesController@nuevo');
Route::post('/clientesGuardar/', 'ClientesController@guardar');
Route::get('/clientesEditar/{cliente_id}', 'ClientesController@editar');
Route::get('/clientes/{buscar}', 'ClientesController@buscar');
Route::get('/clientesPDF/','ClientesController@downloadPDF');
Route::get('/clientesPDF/{buscar}','ClientesController@downloadPDF');
Route::match(['get', 'post'], '/clientesImagen/', 'ClientesController@Image');
Route::delete('/clientesImagen/{filename}', 'ClientesController@deleteImage');

Route::get('/ventas', 'VentasController@index');
Route::get('/ventasEliminar/{venta_id}', 'VentasController@eliminar');
Route::get('/ventasNuevo/', 'VentasController@nuevo');
Route::post('/ventasGuardar/', 'VentasController@guardar');
Route::get('/ventasEditar/{venta_id}', 'VentasController@editar');
Route::get('/ventas/{busqueda}', 'VentasController@buscar');
Route::get('/ventasPDF/', 'VentasController@descargarPDF');
Route::get('/ventasPDF/{busqueda}', 'VentasController@descargarPDF');
Route::match(['get', 'post'], 'ventasImagen', 'VentasController@ajaxImage');
Route::delete('ventasImagen/{filename}', 'VentasController@deleteImage');


Route::get('/empleados', 'EmpleadosController@index');
Route::get('/empleados/{buscar}', 'EmpleadosController@buscar');
Route::get('/empleadosEliminar/{empleado_id}', 'EmpleadosController@eliminar');
Route::get('/empleadosNuevo/', 'EmpleadosController@nuevo');
Route::post('/empleadosGuardar/', 'EmpleadosController@guardar');
Route::get('/empleadosEditar/{empleado_id}', 'EmpleadosController@editar');
Route::get('/empleadosPDF/','EmpleadosController@downloadPDF');
Route::get('/empleadosPDF/{buscar}','EmpleadosController@downloadPDF');
Route::match(['get', 'post'], '/empleadosImagen/', 'EmpleadosController@cargaImagen');
Route::delete('/empleadosImagen/{filename}', 'EmpleadosController@deleteImage');


Route::get('/categorias', 'CategoriaController@index');
Route::get('/categoriasEliminar/{categoria_id}', 'CategoriaController@eliminar');
Route::get('/categoriasNuevo/', 'CategoriaController@nuevo');
Route::post('/categoriasGuardar/','CategoriaController@guardar');
Route::get('/categoriasEditar/{categoria_id}','CategoriaController@editar');
Route::get('/categorias/{buscar}','CategoriaController@buscar');
Route::get('/categoriasPDF/','CategoriaController@downloadPDF');
Route::get('/categoriasPDF/{buscar}','CategoriaController@downloadPDF');
Route::match(['get', 'post'], '/categoriaImagen/', 'CategoriaController@Image');
Route::delete('/categoriaImagen/{filename}', 'CategoriaController@deleteImage');




Route::get('/apartados', 'ApartadoController@index');
Route::get('/apartadosEliminar/{apartado_id}', 'ApartadoController@eliminar');
Route::get('/apartadosNuevo/', 'ApartadoController@nuevo');
Route::post('/apartadosGuardar/', 'ApartadoController@guardar');
Route::get('/apartadosEditar/{apartado_id}', 'ApartadoController@editar');
Route::get('/apartados/{buscar}', 'ApartadoController@buscar');
Route::get('/apartadosPDF/','ApartadoController@downloadPDF');
Route::get('/apartadosPDF/{buscar}','ApartadoController@downloadPDF');
Route::match(['get', 'post'], '/apartadosImagen/', 'ApartadoController@Image');
Route::delete('/apartadosImagen/{filename}', 'ApartadoController@deleteImage');

Route::get('/aparece', 'ApareceController@index');
Route::get('/apareceEliminar/{aparece_id}','ApareceController@eliminar');
Route::get('/apareceNuevo/','ApareceController@nuevo');
Route::post('/apareceGuardar/','ApareceController@guardar');
Route::get('/apareceEditar/{aparece_id}','ApareceController@editar');
Route::get('/aparece/{aparece_id}','ApareceController@buscar');
Route::get('/aparecePDF/','ApareceController@downloadPDF');
Route::get('/aparecePDF/{buscar}','ApareceController@downloadPDF');
Route::match(['get', 'post'], '/apareceImagen', 'ApareceController@Image');
Route::delete('/apareceImagen/{filename}', 'ApareceController@deleteImage');

Route::get('/compras', 'ComprasController@index');


Route::get('/sucursal', 'SucursalController@index');
Route::get('/sucursalEliminar/{sucursal_id}', 'SucursalController@eliminar');
Route::get('/sucursalNuevo/', 'SucursalController@nuevo');
Route::post('/sucursalGuardar/', 'SucursalController@guardar');
Route::get('/sucursalEditar/{sucursal_id}', 'SucursalController@editar');
Route::match(['get', 'post'], '/sucursalImagen/', 'SucursalController@Image');
Route::delete('/sucuralImagen/{filename}', 'SucursalController@deleteImage');
Route::get('/sucursalPDF/','SucursalController@downloadPDF');
Route::get('/sucursalPDF/{buscar}','SucursalController@downloadPDF');
Route::get('/sucursal/{buscar}', 'SucursalController@buscar');