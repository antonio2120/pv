<?php

namespace App\Http\Controllers;
use App\Aparece;
use App\Apartado;
use Illuminate\Http\Request;
use PDF;

class ApareceController extends Controller {
    public function index()
    {
        $aparece = Aparece::all();
        $title = "Lista de Aparece";
        $numRegistros= $aparece->count();
        return view('aparece')
            ->with('aparece', $aparece)
            ->with('title', $title)
            ->with('numRegistros', $numRegistros) ;
                    
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
        $apartado= Apartado::all();
        $aparece = null;
        $accion = "nuevo";
        return view('apareceNuevo')
            ->with('title', $title)
            ->with('apartado', $apartado) 
            ->with('accion', $accion);
    }

     public function guardar(Request $request)
    {
        try {
            if($request->accion == 'nuevo') {
                $aparece = new Aparece();
                $aparece->apartado_id = $request->apartado;
                $aparece->codigo_barras= $request->codigo_barras;
                $aparece->cantidadxPro= $request->cantidadxPro;
                if ($aparece->save()) {
                    return response()->json(['mensaje' => 'aparece agregado', 'status' => 'ok'], 200);
                } else {
                    return response()->json(['mensaje' => 'Error al agregar el aparece', 'status' => 'error'], 400);
                }
            }else if($request->accion == 'editar'){
                if($aparece = Aparece::find($request->id)){
                $aparece->apartado_id = $request->apartado;
                $aparece->codigo_barras= $request->codigo_barras;
                $aparece->cantidadxPro= $request->cantidadxPro;
                    if ($aparece->save()) {
                        return response()->json(['mensaje' => 'Cambios guardados correctamente', 'status' => 'ok'], 200);
                    } else {
                        return response()->json(['mensaje' => 'Error al intentar guardar los cambios', 'status' => 'error'], 400);
                    }
                }else{
                    return response()->json(['mensaje' => 'aparece no encontrado', 'status' => 'error'], 400);
                }
            }
        } catch (Exception $e) {
            return response()->json(['mensaje' => 'Error al agregar el apartado'], 403);
        }
    }
  


   
 public function editar($aparece_id)
       {
         if ($aparece_id) {
            $accion = "editar";
            try {
                if($aparece = Aparece::find($aparece_id)){
                    $title = "Editar Aparece (".$aparece_id.")";
                    $apartado= Apartado::all();
                    return view('apareceNuevo')
                    ->with('title', $title)
                    ->with('apartado', $apartado) 
                    ->with('accion', $accion)
                    ->with('aparece',$aparece);

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
    

    public function buscar($buscar){
            $aparece= Aparece::where('codigo_barras','like',$buscar.'%')
            ->get();
            $title="Lista de Aparece | ".$buscar;
            $numRegistros= $aparece->count();
            return view('aparece')
            ->with('title', $title)
                    ->with('numRegistros', $numRegistros) 
                    ->with('aparece',$aparece);
                      }

       public function downloadPDF($buscar = null){
          if(!isset($buscar) || $buscar == null){
            $aparece = Aparece::all();
          }else {
             $aparece= Aparece::where('codigo_barras','like',$buscar.'%')
            ->get();
          }
          $title = "Lista de Aparece | ". $buscar;
          $numRegistros = $aparece->count();
          $pdf = PDF ::loadView('aparecePDF', compact('aparece','title','numRegistros'));
          return $pdf->download('aparece.pdf');
        }                 
}
