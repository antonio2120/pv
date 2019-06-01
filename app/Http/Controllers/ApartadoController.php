<?php

namespace App\Http\Controllers;
use App\Apartado;
use App\Cliente;
use App\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use PDF;

class ApartadoController extends Controller {
    public function index()
    {
        $apartados = Apartado::all();
        $title = "Lista de apartados";
        $numRegistros = $apartados->count();
        return view('apartados')
            ->with('apartados', $apartados)
            ->with('title', $title)
            ->with('numRegistros', $numRegistros);
    }

    public function eliminar($apartado_id)
    {
        if ($apartado_id) {
            try {
                if(Apartado::destroy($apartado_id)){
                    return response()->json(['mensaje' => 'Apartado eliminado', 'status' => 'ok'], 200);
                }else{
                    return response()->json(['mensaje' => 'El apartado no se pudo eliminar', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error al eliminar el apartado'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al eliminar el apartado, apartado no encontrado '], 400);
        }

    }

    public function nuevo()
    {
        $title = "Nuevo Apartado";
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        $apartado = null;
        $accion = "nuevo";
        return view('apartadosNuevo')
            ->with('title', $title)
            ->with('clientes', $clientes)
            ->with('empleados', $empleados)
            ->with('apartado', $apartado)
            ->with('accion', $accion);

    }

    public function guardar(Request $request)
    {
        try {
            if($request->accion == 'nuevo') {
                $apartado = new Apartado();
                $apartado->clientes_id = $request->cliente;
                $apartado->fecha_inicio = $request->fecha_inicio;
                $apartado->fecha_fin = $request->fecha_fin;
                $apartado->anticipo = $request->anticipo;
                $apartado->total = $request->total;
                $apartado->empleados_id = $request->empleado;
                if ($apartado->save()) {
                    return response()->json(['mensaje' => 'apartado agregado', 'status' => 'ok'], 200);
                } else {
                    return response()->json(['mensaje' => 'Error al agregar el apartado', 'status' => 'error'], 400);
                }
            }else if($request->accion == 'editar'){
                if($apartado = Apartado::find($request->id)){
                $apartado->clientes_id = $request->cliente;
                $apartado->fecha_inicio = $request->fecha_inicio;
                $apartado->fecha_fin = $request->fecha_fin;
                $apartado->anticipo = $request->anticipo;
                $apartado->total = $request->total;
                $apartado->empleados_id = $request->empleado;
                    if ($apartado->save()) {
                        return response()->json(['mensaje' => 'Cambios guardados correctamente', 'status' => 'ok'], 200);
                    } else {
                        return response()->json(['mensaje' => 'Error al intentar guardar los cambios', 'status' => 'error'], 400);
                    }
                }else{
                    return response()->json(['mensaje' => 'apartado no encontrado', 'status' => 'error'], 400);
                }
            }
        } catch (Exception $e) {
            return response()->json(['mensaje' => 'Error al agregar el apartado'], 403);
        }
    }

    public function editar($apartado_id)
    {
        if ($apartado_id) {
            $accion = "editar";
            try {
                if($apartado = Apartado::find($apartado_id)){
                    $title = "Editar apartado";
                    $clientes = Cliente::all();
                    $empleados = Empleado::all();
                    return view('apartadosNuevo')
                        ->with('title', $title)
                        ->with('clientes', $clientes)
                        ->with('empleados', $empleados)
                        ->with('apartado', $apartado)
                        ->with('accion', $accion);
                }else{
                    return response()->json(['mensaje' => 'apartado no encontrado', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error al eliminar el apartado'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al eliminar el apartado, apartado no encontrado '], 400);
        }

    }

    public function buscar($buscar)
    {
        $apartados = Apartado::where('fecha_inicio','like', $buscar.'%')
            ->orWhere('fecha_fin','like', $buscar.'%')
            ->orWhere('anticipo', $buscar)
            ->orWhere('total', $buscar)
            ->get();
        $title = "Lista de apartados | ".$buscar;
        $numRegistros = $apartados->count();
        return view('apartados')
            ->with('apartados', $apartados)
            ->with('title', $title)
            ->with('numRegistros', $numRegistros)
            ->with('buscar', $buscar);
    }

    public function downloadPDF($buscar = null){
        if(!isset($buscar) || $buscar == null){
            $apartados = Apartado::all();
        }else {
            $apartados = Apartado::where('fecha_inicio','like', $buscar.'%')
                ->orWhere('fecha_fin','like', $buscar.'%')
                ->orWhere('anticipo', $buscar)
                ->orWhere('total', $buscar)
                ->get();
        }
        $title = "Lista de apartados | " . $buscar;
        $numRegistros = $apartados->count();

        $pdf = PDF::loadView('apartadosPDF', compact('apartados', 'title', 'numRegistros'));
        return $pdf->download('apartados.pdf');

    }

    public function ajaxImage(Request $request)
        {
            if ($request->isMethod('get'))
                return view('apartados_image_upload');
            else {
                $validator = Validator::make($request->all(),
                    [
                        'file' => 'image',
                    ],
                    [
                        'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
                    ]);
                if ($validator->fails())
                    return array(
                        'fail' => true,
                        'errors' => $validator->errors()
                    );
                $extension = $request->file('file')->getClientOriginalExtension();
                $dir = 'uploads/';
                $filename = uniqid() . '_' . time() . '.' . $extension;
                $request->file('file')->move($dir, $filename);
                return $filename;
            }
        }

    public function deleteImage($filename)
    {
        File::delete('uploads/' . $filename);
    }

}