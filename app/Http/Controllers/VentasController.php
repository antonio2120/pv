<?php

namespace App\Http\Controllers;
use App\Ventas;
use App\Empleado;
use Illuminate\Http\Request;
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
        $empleados = Empleado::All();
        $venta = null;
        $accion = "nuevo";
        return view('ventasNuevo')
            ->with('title', $title)
            ->with('empleados', $empleados)
            ->with('venta', $venta)
             ->with('accion', $accion);

    }
    public function guardar(Request $request)
    {
        try {
            if($request->accion == 'nuevo') {
                $venta = new Ventas();
                $venta->fecha = $request->fecha;
                $venta->hora = $request->hora;
                $venta->total = $request->total;
                $venta->empleado_id = $request->empleado_id;

                if ($venta->save()) {
                    return response()->json(['mensaje' => 'Venta Registrada', 'status' => 'ok'], 200);
                } else {
                    return response()->json(['mensaje' => 'Error al agregar la Venta', 'status' => 'error'], 400);
                }
            }else if($request->accion == 'editar'){
                if($venta = Ventas::find($request->id)){
                    $venta->fecha = $request->fecha;
                    $venta->hora = $request->hora;
                    $venta->total = $request->total;
                    $venta->empleado_id = $request->empleado_id;
                    if ($venta->save()) {
                        return response()->json(['mensaje' => 'Cambios guardados correctamente', 'status' => 'ok'], 200);
                    } else {
                        return response()->json(['mensaje' => 'Error al intentar guardar los cambios', 'status' => 'error'], 400);
                    }
                }else{
                    return response()->json(['mensaje' => 'Producto no encontrado', 'status' => 'error'], 400);
                }
            }


        } catch (Exception $e) {
            return response()->json(['mensaje' => 'Error al agregar la Venta'], 403);
        }
    }


    public function editar($venta_id)
    {
        if ($venta_id) {
            $accion = "editar";
            try {
                if($venta = Ventas::find($venta_id)){
                    $title = "Editar Venta";
                    $empleados = Empleado::All();
                    return view('ventasNuevo')
                        ->with('title', $title)
                        ->with('empleados', $empleados)
                        ->with('venta',$venta)
                        ->with('accion', $accion);
                }else{
                    return response()->json(['mensaje' => 'Venta no encontrada', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error al registrar los cambios de la venta'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al dar de alta la Venta, no fue encontrada'], 400);
        }
    }

    public function busqueda($busqueda){

        $busqueda = Ventas::where('fecha','like', $busqueda.'%')
            ->orWhere('hora','like',$busqueda.'%')
            ->orWhere('total','like',$busqueda.'%')
            ->get();

        return view('ventas');







    }
}
