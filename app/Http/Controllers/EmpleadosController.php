<?php

namespace App\Http\Controllers;
use App\Empleado;

class EmpleadosController extends Controller {
    public function index()
    {
        $empleados = Empleado::all();
        $title = "Lista de Empleados";
        return view('empleados')
            ->with('empleados', $empleados)
            ->with('title', $title);
    }

    public function delete($empleado_id)
    {
        $empleado = Producto::find($empleado_id);
        if($empleado){
            $empleado->deleted();
            echo "Empleado eliminado";
        }else{
            echo "Empleado no existe";
        }


    }
    public function nuevo()
    {
        $title = "Nuevo Empleado";
        return view('empleadosNuevo')
            ->with('title', $title);

    }
}

