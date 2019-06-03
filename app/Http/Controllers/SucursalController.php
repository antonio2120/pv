<?php

   
namespace App\Http\Controllers;
use App\Sucursal;
use Illuminate\Http\Request;
use PDF;
use App\UserDetail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SucursalController extends Controller{

    public function index()
    {
        $sucursal = Sucursal::all();
        $title = "sucursales ";
        $numRegistros = $sucursal->count();
        return view('sucursal')
       ->with('sucursal', $sucursal)
       ->with('title', $title)
        ->with('numRegistros', $numRegistros); 
    }

 
    public function downloadPDF($buscar = null){
        if( !isset($buscar) || $buscar == null){
            $sucursal = Sucursal::all();
        }else {
            $sucursal = Sucursal::where('nombre', 'like', $buscar . '%')
                ->orWhere('descripcion', 'like', $buscar . '%')
                ->orWhere('precio', $buscar)
                ->orWhere('costo', $buscar)
                ->get();
        }
        $title = "Lista de Sucursal | " . $buscar;
        $numRegistros = $sucursal->count();

        $pdf = PDF::loadView('sucursalPDF', compact('sucursal', 'title', 'numRegistros'));
        return $pdf->download('sucursal.pdf');

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

public function buscar($buscar)
{
    $sucursal = Sucursal::where('nombre','like',$buscar."%")

        ->orWhere('direccion','like',$buscar.'%')
        ->orWhere('telefono',$buscar)
        ->get();

        $title = "Lista de Sucursal | ".$buscar;
        $numRegistros = $sucursal->count();
        return view('sucursal')
        ->with('sucursal', $sucursal)
        ->with('title', $title)
        ->with('numRegistros', $numRegistros);        
}
  
    public function nuevo()
    {
        $title = "Nueva Sucursal";
        $sucursal = null;
        $accion = "nuevo";
        return view('sucursalNuevo')
            ->with('title', $title)
            ->with('sucursal', $sucursal)
            ->with('accion', $accion);

    }
    public function guardar(Request $request)
    {
        try {
            if($request->accion == 'nuevo') {
                $sucursal = new Sucursal();
                $sucursal->nombre = $request->nombre;
                $sucursal->direccion = $request->direccion;
                $sucursal->telefono = $request->telefono;
            
                if ($sucursal->save()) {
                    return response()->json(['mensaje' => 'Sucursal agregada', 'status' => 'ok'], 200);
                } else {
                    return response()->json(['mensaje' => 'Error al agregar Sucursal', 'status' => 'error'], 400);
                }
            }else if($request->accion == 'editar'){
                if($sucursal = Sucursal::find($request->id)){
                    $sucursal->nombre = $request->nombre;
                    $sucursal->direccion = $request->direccion;
                    $sucursal->telefono = $request->telefono;
                    if ($sucursal->save()) {
                        return response()->json(['mensaje' => 'Cambios guardados correctamente', 'status' => 'ok'], 200);
                    } else {
                        return response()->json(['mensaje' => 'Error al intentar guardar los cambios', 'status' => 'error'], 400);
                    }
                }else{
                    return response()->json(['mensaje' => 'Sucursal no encontrada', 'status' => 'error'], 400);
                }
            }
        } catch (Exception $e) { 
            return response()->json(['mensaje' => 'Error al agregar'], 403);
        }
    }
    public function editar($sucursal_id)
    {
        if ($sucursal_id) {
            $accion = "editar";
            try {
                if($sucursal= Sucursal::find($sucursal_id)){
                    $title = "Editar Sucursal";
        
                    return view('sucursalNuevo')
                        ->with('title', $title)
                        ->with('sucursal', $sucursal)
                        ->with('accion', $accion);
                }else{
                    return response()->json(['mensaje' => 'Sucursal no encontrada', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error al eliminar la Sucursal'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al eliminar Sucursal, Sucursal no encontrada'], 400);
        }

    }

    public function store(Request $request){

      $user = new UserDetail([
        'nombre' => $request->get('nombre'),
        'direccion' => $request->get('direccion'),
        'telefono' => $request->get('telefono')
      ]);

      $user->save();
      return redirect('/index');
    }
   
public function Image(Request $request)
    {
        if ($request->isMethod('get')){
            $title = "Imagen Cliente";
            return view('clientesImagen')
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
