<?php

namespace App\Http\Controllers;
use App\Compra;

class ComprasController extends Controller {
    public function index()
    {
        $compras = Compra::all();
        $title = "Lista de Compras";
        return view('compras')
            ->with('compras', $compras)
            ->with('title', $title);
    }
}