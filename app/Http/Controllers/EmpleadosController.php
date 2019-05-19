<?php

namespace App\Http\Controllers;
use App\Empleado;
use Illuminate\Http\Request;

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
    public function guardar(Request $request)
    {
        try {
            $empleado = new Empleado();
            $empleado->nombre = $request->nombre;
            $empleado->apellido = $request->apellido;
            $empleado->nombreUsuario = $request->nombreUsuario;
            $empleado->password = $request->password;
            $empleado->terminos = $request->terminos;
            if($empleado->save()){
                return response()->json(['mensaje' => 'Empleado agregado', 'status' => 'ok'], 200);
            }else{
                return response()->json(['mensaje' => 'Error al agregar Empleado', 'status' => 'error'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['mensaje' => 'Error al agregar Empleado'], 403);
        }
    }

}

