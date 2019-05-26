<?php

namespace App\Http\Controllers;
use App\Aparece;
use App\Apartado;
use Illuminate\Http\Request;


class ApareceController extends Controller {
    public function index()
    {
        $aparece = Aparece::all();
        $title = "Lista de Aparece";
        return view('aparece')
            ->with('aparece', $aparece)
            ->with('title', $title);
    }

      public function eliminar($aparece_id)
    {
       if($aparece_id){
         try{
            if(Aparece::destroy($aparece_id)){
               return response()->json(['mensaje' => 'Aparece Elimindada', 'status' => 'ok'], 200);
            }else{
                return response()->json(['mensaje'=>'Aprece no existe','status' =>'error'],400);
              }
         } catch (Exception $e){
             return response()->json(['mensaje'=>'Error al eliminar Aparece'],400);
      }

    }else {
        return response()->json(['mensaje'=>'Error al eliminar Aparece, Aparece no encontrada'],400);
        }
    }

    public function nuevo()
    {
        $title = "Nuevo aparece";
        $aparece = null;
        $accion = "nuevo";
        return view('apareceNuevo')
            ->with('title', $title)
            ->with('accion', $accion);
    }

    public function guardar(Request $request)
    {
        try {
            $aparece = new Aparece();
            $aparece->apartado_id = $request->apartado;
            $aparece->codigo_barras = $request->codigo_barras;
            $aparece->cantidadxPro = $request->cantidadxPro;
            if($aparece->save()){
                return response()->json(['mensaje' => 'Aparece agregado', 'status' => 'ok'], 200);
            }else{
                return response()->json(['mensaje' => 'Error al agregar aparece', 'status' => 'error'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['mensaje' => 'Error al agregar aparece'], 403);
        }
    }

    public function editar($aparece_id)
       {
         if ($aparece_id) {
            $accion = "editar";
            try {
                if($aparece = Aparece::find($aparece_id)){
                    $title = "Editar Aparece";
                   return view('apareceNuevo')
                   ->with('title', $title)
                   ->with('accion', $accion);
                }else{
                    return response()->json(['mensaje' => 'No se encontro aparece', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error aparece no Eliminada'], 400);
            }
           }else{
            return response()->json(['mensaje' => 'Error al eliminar al aparece, aparece no encontrado '], 400);
                  }

        }
   
}