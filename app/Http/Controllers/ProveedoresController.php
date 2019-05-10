<?php

namespace App\Http\Controllers;
use App\Proveedor;

class ProveedoresController extends Controller {
    public function index()
    {
        $proveedores = Proveedor::all();
        $title = "Tabla de Proveedores";
        return view('proveedores')
            ->with('proveedores', $proveedores)
            ->with('title', $title);
    }
}