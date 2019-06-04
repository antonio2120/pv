<?php

namespace App\Http\Controllers;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use PDF;

class ClientesController extends Controller{
    public function index(){
    	$clientes = Cliente::all();
        $title = "Lista de Clientes";
        $numRegistros = $clientes->count();
        return view('clientes')
            ->with('clientes', $clientes)
            ->with('title', $title)
            ->with('numRegistros', $numRegistros);
    }

    public function buscar($buscar){
       $clientes = Cliente::where ('nombres','like', $buscar.'%')
        ->orWhere('id','like', $buscar)
        ->orWhere ('apaterno', 'like', $buscar.'%')
        ->orWhere ('amaterno', 'like', $buscar.'%')
        ->orWhere ('nombres', 'like', $buscar.'%')
        ->get();
       $title = "Lista de Clientes | ".$buscar;
        $numRegistros = $clientes->count(); 
        return view('clientes')
        ->with('clientes', $clientes)
        ->with('title', $title)
        ->with('buscar', $buscar)
        ->with('numRegistros', $numRegistros);
    }

    public function downloadPDF($buscar = null){
          if(!isset($buscar) || $buscar == null){
            $clientes = Cliente::all();
          }else {
            $clientes = Cliente::where('nombres','like',$buscar. '%')
            ->orWhere('id','like', $buscar)
            ->orWhere ('apaterno', 'like', $buscar.'%')
            ->orWhere ('amaterno', 'like', $buscar.'%')
            ->orWhere ('nombres', 'like', $buscar.'%')
            ->get();
          }
          $title = "Lista de Clientes | ". $buscar;
          $numRegistros = $clientes->count();
          $pdf = PDF ::loadView('clientesPDF', compact('clientes','title','numRegistros'));
          return $pdf->download('clientes.pdf');
    }

    public function eliminar($cliente_id)
    {
        if ($cliente_id) {
            try {
                if(Cliente::destroy($cliente_id)){
                    return response()->json(['mensaje' => 'Cliente eliminado', 'status' => 'ok'], 200);
                }else{
                    return response()->json(['mensaje' => 'El cliente no se pudo eliminar', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error al eliminar el cliente'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al eliminar el cliente, cliente no encontrado '], 400);
        }
    }

    public function nuevo()
    {
        $title = "Nuevo Cliente";
        $cliente = null;
        $accion = "nuevo";
        return view('clientesNuevo')
            ->with('title', $title)
            ->with('cliente', $cliente)
            ->with('accion', $accion);
    }

    public function guardar(Request $request)
    {
        try {
            if($request->accion == 'nuevo'){
            $cliente = new Cliente();
            $cliente->nombres = $request->nombres;
            $cliente->apaterno = $request->apaterno;
            $cliente->amaterno = $request->amaterno;
            $cliente->direccion = $request->direccion;
            $cliente->telefono = $request->telefono;
            $cliente->correo = $request->correo;
                if($cliente->save()){
                    $cliente_id = $cliente->id;
                    if( $request->hasFile('imagen')) {
                        $file = $request->file('imagen');
                        $extension = $file->getClientOriginalExtension();
                        $fileName = $cliente_id . '.' . $extension;
                        $path = public_path('img/clientes/');
                        $request->file('imagen')->move($path, $fileName);
                    }
                    return response()->json(['mensaje' => 'Cliente agregado', 'status' => 'ok'], 200);
                }
                else{
                return response()->json(['mensaje' => 'Error al agregar el Cliente', 'status' => 'error'], 400);
                }
            }
        else if($request->accion == 'editar'){
            if($cliente = Cliente::find($request->id)){
                $cliente->nombres = $request->nombres;
                $cliente->apaterno = $request->apaterno;
                $cliente->amaterno = $request->amaterno;
                $cliente->direccion = $request->direccion;
                $cliente->telefono = $request->telefono;
                $cliente->correo = $request->correo;
                     if ($cliente->save()) {
                        $cliente_id = $cliente->id;
                        if( $request->hasFile('imagen')) {
                            $cliente_id = $request->id;
                            $file = $request->file('imagen');
                            //$extension = $file->getClientOriginalExtension();
                            $extension = 'jpg';
                            $fileName = $cliente_id . '.' . $extension;
                            $path = public_path('img/clientes/');
                            $request->file('imagen')->move($path, $fileName);
                        }
                        return response()->json(['mensaje' => 'Cambios guardados correctamente', 'status' => 'ok'], 200);
                    } else {
                        return response()->json(['mensaje' => 'Error al intentar guardar los cambios', 'status' => 'error'], 400);
                    }
                }else{
                    return response()->json(['mensaje' => 'Cliente no encontrado', 'status' => 'error'], 400);
                }
         }   
        }catch (Exception $e) {
            return response()->json(['mensaje' => 'Error al agregar el Cliente'], 403);
        }
    }

    public function editar($cliente_id)
    {
        if ($cliente_id) {
            $accion = "editar";
            try {
                if($cliente = Cliente::find($cliente_id)){
                    $title = "Editar Cliente";
                    return view('clientesNuevo')
                        ->with('title', $title)
                        ->with('cliente', $cliente)
                        ->with('accion', $accion);
                }else{
                    return response()->json(['mensaje' => 'Cliente no encontrado', 'status' => 'error'], 400);
                }
            } catch (Exception $e) {
                return response()->json(['mensaje' => 'Error al eliminar al Cliente'], 400);
            }
        }else{
            return response()->json(['mensaje' => 'Error al eliminar al cliente, Cliente no encontrado '], 400);
        }

    }
}
