<?php

namespace App\Http\Controllers;
use App\Ventas;

class VentasController extends Controller{
    public function index(){
    	$ventas = Ventas::all();
        $title = "Lista de Ventas";
        return view('ventas')
            ->with('ventas', $ventas)
            ->with('title', $title);
    }
    public function eliminar($venta_id)
    {
        if ($venta_id) {
            try {
                if(Ventas::destroy($venta_id)){
                    return response()->json(['mensaje' => 'Venta eliminada', 'status' => 'ok'], 200);
                }else{
                    return response()->json(['mensaje' => 'La Venta no se pudo eliminar', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error al eliminar la Venta'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al eliminar la Venta, esta fué encontrada '], 400);
        }

    }
    public function nuevo()
    {
        $title = "Nueva Venta";
        return view('ventasNuevo')
            ->with('title', $title);

    }
}
