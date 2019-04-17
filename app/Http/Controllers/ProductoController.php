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
}