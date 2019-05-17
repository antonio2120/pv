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

    public function eliminar($empleado_id)
    {
        if ($empleado_id) {
            try {
                if(Empleado::destroy($empleado_id)){
                    return response()->json(['mensaje' => 'Empleado eliminado', 'status' => 'ok'], 200);
                }else{
                    return response()->json(['mensaje' => 'El empleado no se pudo eliminar', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error al eliminar empleado'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al eliminar el empleado, empleado no encontrado '], 400);
        }

    }
    public function nuevo()
    {
        $title = "Nuevo Empleado";
        return view('empleadosNuevo')
            ->with('title', $title);

    }
    public function editar($request)
    {

        $empleado=Empleado::where('id', '=', "$request->id")->first();


        if(count($empleado)>=1){

            $empleado->nombre = $request->nombre;
            $empleado->save();
        }


    }

}

