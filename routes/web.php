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
Route::match(['get', 'post'], 'proveedores-image-upload', 'ProveedoresController@ajaxImage');
Route::delete('proveedores-remove-image/{filename}', 'ProveedoresController@deleteImage');

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

Route::get('/empleados', 'EmpleadosController@index');
Route::get('/empleados/{buscar}', 'EmpleadosController@buscar');
Route::get('/empleadosEliminar/{empleado_id}', 'EmpleadosController@eliminar');
Route::get('/empleadosNuevo/', 'EmpleadosController@nuevo');
Route::post('/empleadosGuardar/', 'EmpleadosController@guardar');
Route::get('/empleadosEditar/{empleado_id}', 'EmpleadosController@editar');
Route::get('/empleadosPDF/','EmpleadosController@downloadPDF');
Route::get('/empleadosPDF/{buscar}','EmpleadosController@downloadPDF');
Route::match(['get', 'post'], 'empleados-image-upload', 'EmpleadosController@ajaxImage');
Route::delete('empleados-remove-image/{filename}', 'EmpleadosController@deleteImage');


Route::get('/categorias', 'CategoriaController@index');
Route::get('/categoriasEliminar/{categoria_id}', 'CategoriaController@eliminar');
Route::get('/categoriasNuevo/', 'CategoriaController@nuevo');
Route::post('/categoriasGuardar/','CategoriaController@guardar');
Route::get('/categoriasEditar/{categoria_id}','CategoriaController@editar');
Route::get('/categorias/{buscar}','CategoriaController@buscar');
Route::get('/categoriasPDF/','CategoriaController@downloadPDF');
Route::get('/categoriasPDF/{buscar}','CategoriaController@downloadPDF');
Route::match(['get', 'post'], 'categorias-image-upload', 'CategoriaController@ajaxImage');
Route::delete('categorias-remove-image/{filename}', 'CategoriaController@deleteImage');



Route::get('/apartados', 'ApartadoController@index');
Route::get('/apartadosEliminar/{apartado_id}', 'ApartadoController@eliminar');
Route::get('/apartadosNuevo/', 'ApartadoController@nuevo');
Route::post('/apartadosGuardar/', 'ApartadoController@guardar');
Route::get('/apartadosEditar/{apartado_id}', 'ApartadoController@editar');
Route::get('/apartados/{buscar}', 'ApartadoController@buscar');
Route::get('/apartadosPDF/','ApartadoController@downloadPDF');
Route::get('/apartadosPDF/{buscar}','ApartadoController@downloadPDF');
Route::match(['get', 'post'], 'apartados-image-upload', 'ApartadoController@ajaxImage');
Route::delete('apartados-remove-image/{filename}', 'ApartadoController@deleteImage');

Route::get('/aparece', 'ApareceController@index');
Route::get('/apareceEliminar/{aparece_id}','ApareceController@eliminar');
Route::get('/apareceNuevo/','ApareceController@nuevo');
Route::post('/apareceGuardar/','ApareceController@guardar');
Route::get('/apareceEditar/{aparece_id}','ApareceController@editar');
Route::get('/aparece/{aparece_id}','ApareceController@buscar');
Route::get('/aparecePDF/','ApareceController@downloadPDF');
Route::get('/aparecePDF/{buscar}','ApareceController@downloadPDF');

Route::get('/compras', 'ComprasController@index');


Route::get('/sucursal', 'SucursalController@index');
Route::get('/sucursalEliminar/{sucursal_id}', 'SucursalController@eliminar');
Route::get('/sucursalNuevo/', 'SucursalController@nuevo');
Route::post('/sucursalGuardar/', 'SucursalController@guardar');
Route::get('/sucursalEditar/{sucursal_id}', 'SucursalController@editar');