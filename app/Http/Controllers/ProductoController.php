<?php

namespace App\Http\Controllers;
use App\Producto;

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
                    return response()->json(['mensaje' => 'El producto no existe', 'status' => 'error'], 400);
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
        return view('productosForm')
            ->with('title', $title);

    }
    public function editar($request)
    {

        $producto=Producto::where('id', '=', "$request->id")->first();


        if(count($producto)>=1){

            $producto->nombre = $request->nombre;
            $producto->save();
        }


    }
}