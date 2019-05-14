<?php

namespace App\Http\Controllers;
use App\Categoria;

class CategoriaController extends Controller {
    public function index()
    {
        $categorias = Categoria::all();
        $title = "Lista de Categorias";
        return view('categorias')
            ->with('categorias', $categorias)
            ->with('title', $title);
    }
    public function delete($categoria_id)
    {
        $categoria = Categoria::find($categoria_id);
        if($categoria){
            $categoria->deleted();
            echo "categoria eliminado";
        }else{
            echo "categoria no existe";
        }

    }
    public function nuevo()
    {
        $title = "Nuevo categoria";
        return view('categoriasNuevo')
            ->with('title', $title);

    }
}

