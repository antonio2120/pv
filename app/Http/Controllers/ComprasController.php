<?php

namespace App\Http\Controllers;
use App\Compras;

class ComprasController extends Controller {
    public function index()
    {
        $compras = Compras::all();
        $title = "Lista de Compras";
        return view('compras')
            ->with('compras', $compras)
            ->with('title', $title);
    }
}