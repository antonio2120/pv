<?php

namespace App\Http\Controllers;
use App\Categoria;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller {
    public function index()
    {
        $categorias = Categoria::all();
        $title = "Lista de Categorias";
        $numRegistros = $categorias->count();
        return view('categorias')
            ->with('categorias', $categorias)
            ->with('title', $title)
            ->with('numRegistros',$numRegistros);
    }
    public function eliminar($categoria_id)
    {
       if($categoria_id){
         try{
            if(Categoria::destroy($categoria_id)){
               return response()->json(['mensaje' => 'Categoria Elimindada', 'status' => 'ok'], 200);
            }else{
                return response()->json(['mensaje'=>'La categoria no existe','status' =>'error'],400);
              }
         } catch (Exception $e){
             return response()->json(['mensaje'=>'Error al eliminar la categoria'],400);
      }

    }else {
        return response()->json(['mensaje'=>'Error al eliminar la categoria, categoria no encontrada'],400);
        }
    }
   
    public function nuevo()
    {
        $title = "Nuevo categoria";
        $categoria = null;
        $accion = "nuevo";
        return view('categoriasNuevo')
            ->with('title', $title)
            ->with('categoria', $categoria)
            ->with('accion', $accion);

    }

    public function guardar(Request $request)
    {
        try{
           
            if($request->accion == 'nuevo'){
                 $categoria = new Categoria();
                 $categoria->nombre = $request->nombre;

                     if($categoria->save()){
                      $categoria_id =$categoria->id;
                      if($request->hasFile('imagen'))
                      {
                        $file = $request->file('imagen');
                        $extension = $file->getClientOriginalExtension();
                        $fileName = $categoria_id . '.' . $extension;
                        $path = public_path('img/categorias/');
                        $request->file('imagen')->move($path, $fileName);

                      }
                        return response()->json(['mensaje' =>'Categoria agregada','status'=>'ok'],200);
                      
                     }else{
                        return reponse()->json(['mensaje' =>'Error al agregar categoria','status' =>'error'],400);
                          }
            }
            else  if($request->accion == 'editar'){
                   if($categoria =  Categoria::find($request->id)){
                    $categoria->nombre = $request->nombre;
                    if($categoria->save()){
                      $categoria_id = $categoria->id;
                      if($request->hasFile('imagen')){
                         $categoria_id = $request->id;
                            $file = $request->file('imagen');
                            //$extension = $file->getClientOriginalExtension();
                            $extension = 'jpg';
                            $fileName = $categoria_id . '.' . $extension;
                            $path = public_path('img/categorias/');
                            $request->file('imagen')->move($path, $fileName);
                      }
                        return response()->json(['mensaje'=>'Cambios Guardados','status' => 'ok'],200);
                      
                      }else{
                        return response()->json(['mensaje' =>'Error al guardar cambios','status' =>'error'],400);
                      }
                    }else{
                        return response()->json(['mensaje' =>'Categoria no encontrada','status' =>'error'],400);
                    }
               }
            }catch(Exception $e){
            return response()->json(['mensaje' =>'Error al agregar la categoria'],403);
               }
               
        
    }

       
    public function editar($categoria_id)
       {
         if ($categoria_id) {
            $accion = "editar";
            try {
                if($categoria = Categoria::find($categoria_id)){
                    $title = "Editar Categoria";
                    return view('categoriasNuevo')
                        ->with('title', $title)
                        ->with('categoria', $categoria)
                        ->with('accion', $accion);
                }else{
                    return response()->json(['mensaje' => 'No se encontro la categoria', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error Categoria no Eliminada'], 400);
            }
           }else{
            return response()->json(['mensaje' => 'Error al eliminar al Categoria, Categoria no encontrado '], 400);
                  }

        }

        public function buscar($buscar)
        {
          $categorias = Categoria:: where ('nombre','like', $buscar.'%')
           ->orWhere('nombre', $buscar)
           ->get();
           $title = "Lista de Categoria |".$buscar;
           $numRegistros = $categorias->count();
           return view('categorias')
           ->with('categorias',$categorias)
           ->with('title',$title)
           ->with('numRegistros',$numRegistros)
           ->with('buscar',$buscar);
        }


        
        public function downloadPDF($buscar = null){
          if(!isset($buscar) || $buscar == null){
            $categorias = Categoria::all();
          }else {
             $categorias = Categoria::where('nombre','like',$buscar.'%')
            ->get();
          }
          $title = "Lista de Categorias | ". $buscar;
          $numRegistros = $categorias->count();
          $pdf = PDF ::loadView('categoriasPDF', compact('categorias','title','numRegistros'));
          return $pdf->download('categorias.pdf');
        } 
        



     

     
    }
