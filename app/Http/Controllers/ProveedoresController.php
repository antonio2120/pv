<?php

namespace App\Http\Controllers;
use App\Proveedor;

class ProveedoresController extends Controller {
    public function index()
    {
        $proveedores = Proveedor::all();
        $title = "Tabla de Proveedores";
        return view('proveedores')
            ->with('proveedores', $proveedores)
            ->with('title', $title);
    }
    public function eliminar($proveedor_id)
    {
        if ($proveedor_id) {
            try {
                if(Proveedor::destroy($proveedor_id)){
                    return response()->json(['mensaje' => 'Proveedor eliminado', 'status' => 'ok'], 200);
                }else{
                    return response()->json(['mensaje' => 'El proveedor no se pudo eliminar', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error al eliminar al proveedor'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al eliminar el proveedor, proveedor no encontrado '], 400);
        }

    }
    public function nuevo()
    {
        $title = "Nuevo Proveedor";
        return view('proveedoresNuevo')
            ->with('title', $title);

    }
    public function editar($request)
    {

        $proveedor=Proveedor::where('id', '=', "$request->id")->first();


        if(count($proveedor)>=1){

            $proveedor->nombre = $request->nombre;
            $proveedor->save();
        }


    }
}