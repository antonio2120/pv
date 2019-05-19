<?php

namespace App\Http\Controllers;
use App\Producto;
use App\Proveedor;
use App\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller {
    public function index()
    {
        $productos = Producto::all();
        $title = "Lista de Productos";
        return view('productos')
            ->with('productos', $productos)
            ->with('title', $title);
    }
    public function eliminar($producto_id)
    {
        if ($producto_id) {
            try {
                if(Producto::destroy($producto_id)){
                    return response()->json(['mensaje' => 'Producto eliminado', 'status' => 'ok'], 200);
                }else{
                    return response()->json(['mensaje' => 'El producto no se pudo eliminar', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error al eliminar el producto'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al eliminar el producto, producto no encontrado '], 400);
        }

    }
    public function nuevo()
    {
        $title = "Nuevo Producto";
        $proveedores = Proveedor::all();
        $categorias = Categoria::all();
        return view('productosForm')
            ->with('title', $title)
            ->with('proveedores', $proveedores)
            ->with('categorias', $categorias);

    }
    public function guardar(Request $request)
    {
        try {
            $producto = new Producto();
            $producto->nombre = $request->nombre_producto;
            $producto->descripcion = $request->descripcion;
            $producto->precio = $request->precio;
            $producto->costo = $request->costo;
            $producto->proveedor_id = $request->proveedor;
            $producto->categoria_id = $request->categoria;
            if($producto->save()){
                return response()->json(['mensaje' => 'Producto agregado', 'status' => 'ok'], 200);
            }else{
                return response()->json(['mensaje' => 'Error al agregar el producto', 'status' => 'error'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['mensaje' => 'Error al agregar el producto'], 403);
        }
    }
}