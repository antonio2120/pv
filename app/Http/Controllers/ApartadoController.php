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
    public function eliminar($apartado_id)
    {
        if ($apartado_id) {
            try {
                if(Apppartado::destroy($apartado_id)){
                    return response()->json(['mensaje' => 'apartado eliminado', 'status' => 'ok'], 200);
                }else{
                    return response()->json(['mensaje' => 'El apartado no se pudo eliminar', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error al eliminar el apartado'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al eliminar el apartado, apartado no encontrado '], 400);
        }

    }
    public function nuevo()
    {
        $title = "Nuevo apartado";
        return view('apartadosNuevo')
            ->with('title', $title);

    }
    public function editar($request)
    {

        $apartado=Apartado::where('id', '=', "$request->id")->first();


        if(count($apartado)>=1){

            $apartado->nombre = $request->nombre;
            $apartado->save();
        }


    }
}