<?php

namespace App\Http\Controllers;
use App\Apartado;

class ApartadosController extends Controller {
    public function index()
    {
        $apartados = Apartado::all();
        $title = "Tabla de Apartados";
        return view('apartados')
            ->with('apartados', $apartados)
            ->with('title', $title);
    }
}