<?php

namespace App\Http\Controllers;
use App\Ventas;

class ProductoController extends Controller {
    public function index()
    {
        $ventas = Ventas::all();
        $title = "Ventas";
        return view('Ventas de día')
            ->with('Descripción', $ventas)
            ->with('title', $title);
    }
}