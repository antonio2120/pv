<?php

namespace App\Http\Controllers;
use App\Categoria;

class CategoriaController extends Controller {
    public function index()
    {
        $categorias = Categoria::all();
        $title = "Lista de Categorias";
        return view('categorias')
            ->with('categorias', $categorias)
            ->with('title', $title);
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
        return view('categoriasNuevo')
            ->with('title', $title);

    }

    public function editar($request)
    {

        $categoria=Categoria::where('id', '=', "$request->id")->first();


        if(count($categoria)>=1){

            $categoria->nombre = $request->nombre;
            $categoria->save();
        }


    }
}

