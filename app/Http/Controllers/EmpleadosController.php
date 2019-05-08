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
}

