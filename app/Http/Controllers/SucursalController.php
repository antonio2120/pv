<?php

namespace App\Http\Controllers;
use App\Sucursal;

class SucursalController extends Controller{
    public function index(){
    $sucursal = Sucursal::all();
    $title = "Sucursales ";
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
        $title = "Nueva sucursal";
        return view('SucursalNuevo')
            ->with('title', $title);

    }
}
