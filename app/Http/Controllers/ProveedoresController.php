<?php

namespace App\Http\Controllers;
use App\Proveedor;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProveedoresController extends Controller {
    public function index()
    {
        $proveedores = Proveedor::all();
        $numRegistros = $proveedores->count();
        $title = "Tabla de Proveedores";
        return view('proveedores')
            ->with('proveedores', $proveedores)
            ->with('title', $title)
            ->with('$numRegistros', $numRegistros);
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
                return response()->json(['mensaje' => 'Error al eliminar al Proveedor'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al eliminar al Proveedor, Proveedor no encontrado '], 400);
        }

    }
    public function nuevo()
    {
        $title = "Nuevo Proveedor";
        $proveedor = null;
        $accion = "nuevo";
        return view('proveedoresNuevo')
            ->with('title', $title)
            ->with('proveedor', $proveedor)
            ->with('accion', $accion);
    }

    public function guardar(Request $request)
    {
        try {
            if($request->accion == 'nuevo') {
                $proveedor = new Proveedor();
            $proveedor->nombre = $request->nombre;
            $proveedor->direccion = $request->direccion;
            $proveedor->ciudad = $request->ciudad;
            $proveedor->telefono = $request->telefono;
            $proveedor->fax = $request->fax;
            $proveedor->correo = $request->correo;
                if ($proveedor->save()) {
                    return response()->json(['mensaje' => 'Proveedor agregado', 'status' => 'ok'], 200);
                } else {
                    return response()->json(['mensaje' => 'Error al agregar al Proveedor', 'status' => 'error'], 400);
                }
            }else if($request->accion == 'editar'){
                if($proveedor = Proveedor::find($request->id)){
            $proveedor->nombre = $request->nombre;
            $proveedor->direccion = $request->direccion;
            $proveedor->ciudad = $request->ciudad;
            $proveedor->telefono = $request->telefono;
            $proveedor->fax = $request->fax;
            $proveedor->correo = $request->correo;
                    if ($proveedor->save()) {
                        return response()->json(['mensaje' => 'Cambios guardados correctamente', 'status' => 'ok'], 200);
                    } else {
                        return response()->json(['mensaje' => 'Error al intentar guardar los cambios', 'status' => 'error'], 400);
                    }
                }else{
                    return response()->json(['mensaje' => 'Proveedor no encontrado', 'status' => 'error'], 400);
                }
            }
        } catch (Exception $e) {
            return response()->json(['mensaje' => 'Error al agregar el Proveedor'], 403);
        }
    }

    public function editar($proveedor_id)
    {
        if ($proveedor_id) {
            $accion = "editar";
            try {
                if($proveedor = Proveedor::find($proveedor_id)){
                    $title = "Editar Proveedor";
                    return view('proveedoresNuevo')
                        ->with('title', $title)
                        ->with('proveedor', $proveedor)
                        ->with('accion', $accion);
                }else{
                    return response()->json(['mensaje' => 'Proveedor no encontrado', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error al eliminar al Proveedor'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al eliminar al Proveedor, Proveedor no encontrado '], 400);
        }

    }

    public function buscar($buscar){
       $proveedores =Proveedor::where ('nombre','like', $buscar.'%')
        ->orWhere('nombre', $buscar)
        ->get();
       $title = "Lista de proveedores | ".$buscar;
        $numRegistros = $proveedores->count();
        return view('proveedores')
        ->with('proveedores', $proveedores)
        ->with('title', $title)
        ->with('numRegistros', $numRegistros);

    }

    public function downloadPDF($buscar = null){
          if(!isset($buscar) || $buscar == null){
            $proveedores = Proveedor::all();
          }else {
            $proveedores = Proveedor:: where('nombre','like',$buscar. '%')
            ->orWhere('direccion','like',$buscar.'%')
            ->orWhere('ciudad','like',$buscar.'%')
            ->orWhere('telefono','like',$buscar.'%')
            ->orWhere('fax','like',$buscar.'%')
            ->orWhere('correo','like',$buscar.'%')
            ->get(); 
          }
          $title = "Lista de Proveedores | ". $buscar;
          $numRegistros = $proveedores->count();
          $pdf = PDF ::loadView('proveedoresPDF', compact('proveedores','title','numRegistros'));
          return $pdf->download('proveedores.pdf');
        }

        public function Image(Request $request)
    {
        if ($request->isMethod('get')){
            $title = "Imagen Proveedor";
            return view('proveedoresImagen') 
                ->with('title', $title);
        }
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