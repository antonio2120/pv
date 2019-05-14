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
    public function delete($venta_id)
    {
        $venta = Producto::find($venta_id);
        if($venta){
            $venta->deleted();
            echo "Venta eliminada";
        }else{
            echo "Venta no existe";
        }


    }
    public function nuevo()
    {
        $title = "Nueva Venta";
        return view('ventasNuevo')
            ->with('title', $title);

    }
}
