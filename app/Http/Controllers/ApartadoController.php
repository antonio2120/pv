<?php

namespace App\Http\Controllers;
use App\Apartado;

class ApartadoController extends Controller {
    public function index()
    {
        $apartados = Apartado::all();
        $title = "Tabla de Apartados";
        return view('apartados')
            ->with('apartados', $apartados)
            ->with('title', $title);
    }
    public function delete($apartado_id)
    {
        $apartado = apartado::find($apartado_id);
        if($apartado){
            $apartado->deleted();
            echo "apartado eliminado";
        }else{
            echo "apartado no existe";
        }

    }
    public function nuevo()
    {
        $title = "Nuevo apartado";
        return view('apartadosNuevo')
            ->with('title', $title);

    }
}