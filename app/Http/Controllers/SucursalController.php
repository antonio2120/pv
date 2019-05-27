<?php

 
namespace App\Http\Controllers;
use App\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller{
    public function index(){
    $sucursal = Sucursal::all();
    $title = "sucursales ";
    return view('sucursal')
   ->with('sucursal', $sucursal)
   ->with('title', $title);
    }
    public function eliminar($sucursal_id)
    {
        if ($sucursal_id) {
            try {
                if(Sucursal::destroy($sucursal_id)){
                    return response()->json(['mensaje' => 'Sucursal eliminado', 'status' => 'ok'], 200);
                }else{
                    return response()->json(['mensaje' => 'La sucursal no se pudo eliminar', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error al eliminar la sucursal'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al eliminar la sucursal, sucursal no encontrada '], 400);
        } 

    }
  
    public function nuevo()
    {
        $title = "Nueva Sucursal";
        $sucursal = null;
        $accion = "nuevo";
        return view('sucursalNuevo')
            ->with('title', $title)
            ->with('sucursal', $sucursal)
            ->with('accion', $accion);

    }
    public function guardar(Request $request)
    {
        try {
            if($request->accion == 'nuevo') {
                $sucursal = new Sucursal();
                $sucursal->nombre = $request->nombre;
                $sucursal->direccion = $request->direccion;
                $sucursal->telefono = $request->telefono;
            
                if ($sucursale->save()) {
                    return response()->json(['mensaje' => 'Sucursal agregada', 'status' => 'ok'], 200);
                } else {
                    return response()->json(['mensaje' => 'Error al agregar Sucursal', 'status' => 'error'], 400);
                }
            }else if($request->accion == 'editar'){
                if($sucursal = Sucursal::find($request->id)){
                    $sucursal->nombre = $request->nombre;
                    $sucursal->direccion = $request->direccion;
                    $sucursal->telefono = $request->telefono;
                    if ($sucursal->save()) {
                        return response()->json(['mensaje' => 'Cambios guardados correctamente', 'status' => 'ok'], 200);
                    } else {
                        return response()->json(['mensaje' => 'Error al intentar guardar los cambios', 'status' => 'error'], 400);
                    }
                }else{
                    return response()->json(['mensaje' => 'Sucursal no encontrada', 'status' => 'error'], 400);
                }
            }
        } catch (Exception $e) { 
            return response()->json(['mensaje' => 'Error al agregar'], 403);
        }
    }
    public function editar($sucursal_id)
    {
        if ($sucursal_id) {
            $accion = "editar";
            try {
                if($sucursal= Sucursal::find($sucursal_id)){
                    $title = "Editar Sucursal";
        
                    return view('sucursalNuevo')
                        ->with('title', $title)
                        ->with('sucursal', $sucursal)
                        ->with('accion', $accion);
                }else{
                    return response()->json(['mensaje' => 'Sucursal no encontrada', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error al eliminar la Sucursal'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al eliminar Sucursal, Sucursal no encontrada'], 400);
        }

    }
}
