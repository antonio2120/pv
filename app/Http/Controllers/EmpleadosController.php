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
    public function buscar($buscar){
       $empleados =Empleado::where ('nombre','like', $buscar.'%')
        ->orWhere('id','like', $buscar)
        ->orWhere('apellido','like', $buscar.'%')
        ->orWhere('nombreUsuario','like', $buscar.'%')
        ->get();
       $title = "Lista de Empleados | ".$buscar;
        $numRegistros = $empleados->count(); 
        return view('empleados')
        ->with('empleados', $empleados)
        ->with('title', $title)
        ->with('numRegistros', $numRegistros);

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
        $empleado = null;
        $accion = "nuevo";
        return view('empleadosNuevo')
            ->with('title', $title)
            ->with('empleado', $empleado)
            ->with('accion', $accion);
    }
    public function guardar(Request $request)
    {
        try {
            if($request->accion == 'nuevo') {
            $empleado = new Empleado();
            $empleado->nombre = $request->nombre;
            $empleado->apellido = $request->apellido;
            $empleado->nombreUsuario = $request->usuario;
            $empleado->password = $request->password;
            if($empleado->save()){
                return response()->json(['mensaje' => 'Empleado agregado', 'status' => 'ok'], 200);
            }else{
                return response()->json(['mensaje' => 'Error al agregar Empleado', 'status' => 'error'], 400);
            }
        }else if($request->accion == 'editar'){
            if($empleado = Empleado::find($request->id)){
                $empleado->nombre = $request->nombre;
                $empleado->apellido = $request->apellido;
                $empleado->nombreUsuario = $request->usuario;
                $empleado->password = $request->password;
                     if ($empleado->save()) {
                        return response()->json(['mensaje' => 'Cambios guardados correctamente', 'status' => 'ok'], 200);
                    } else {
                        return response()->json(['mensaje' => 'Error al intentar guardar los cambios', 'status' => 'error'], 400);
                    }
                }else{
                    return response()->json(['mensaje' => 'Proveedor no encontrado', 'status' => 'error'], 400);
                }
        }    
      }catch (Exception $e) {
            return response()->json(['mensaje' => 'Error al agregar Empleado'], 403);
       }
    }

    public function editar($empleado_id)
    {
        if ($empleado_id) {
            $accion = "editar";
            try {
                if($empleado = Empleado::find($empleado_id)){
                    $title = "Editar Empleado";
                    return view('empleadosNuevo')
                        ->with('title', $title)
                        ->with('empleado', $empleado)
                        ->with('accion', $accion);
                }else{
                    return response()->json(['mensaje' => 'Empleado no encontrado', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error al eliminar al Empleado'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al eliminar al Empleado, Empleado no encontrado '], 400);
        }

    }
}

