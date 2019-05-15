<?php

namespace App\Http\Controllers;
use App\Aparece;

class ApareceController extends Controller {
    public function index()
    {
        $aparece = Aparece::all();
        $title = "Lista de Aparece";
        return view('aparece')
            ->with('aparece', $aparece)
            ->with('title', $title);
    }

      public function eliminar($apartado_id)
    {
       if($aparece_id){
         try{
            if(Aparece::destroy($apartado_id)){
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
        return view('apareceNuevo')
            ->with('title', $title);

    }


    public function editar($request)
    {

        $caparece=Aparece::where('id', '=', "$request->id")->first();


        if(count($aparece)>=1){

            $aparece->apartado_id = $request->nombre;
            $aparece->save();
        }


    }
}
