<?php

namespace App\Http\Controllers;
use App\Categoria;

class CategoriasController extends Controller {
    public function index()
    {
        $categorias = Categoria::all();
        $title = "Lista de Categorias";
        return view('categorias')
            ->with('categorias', $categorias)
            ->with('title', $title);
    }
}

