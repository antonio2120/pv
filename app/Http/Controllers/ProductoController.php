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
    public function delete($producto_id)
    {
        $producto = Producto::find($producto_id);
        if($producto){
            $producto->deleted();
            echo "Producto eliminado";
        }else{
            echo "Producto no existe";
        }


    }
    public function nuevo()
    {
        $title = "Nuevo Producto";
        return view('productosNuevo')
            ->with('title', $title);

    }
}