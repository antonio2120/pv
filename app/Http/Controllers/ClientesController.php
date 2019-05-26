<?php

namespace App\Http\Controllers;
use App\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller{
    public function index(){
    	$clientes = Cliente::all();
        $title = "Lista de Clientes";
        return view('clientes')
            ->with('clientes', $clientes)
            ->with('title', $title);
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
        return view('clientesNuevo')
            ->with('title', $title);
    }

    public function guardar(Request $request)
    {
        try {
            $cliente = new Cliente();
            $cliente->nombres = $request->nombres;
            $cliente->apaterno = $request->apaterno;
            $cliente->amaterno = $request->amaterno;
            $cliente->direccion = $request->direccion;
            $cliente->telefono = $request->telefono;
            $cliente->correo = $request->correo;
            if($cliente->save()){
                return response()->json(['mensaje' => 'Producto agregado', 'status' => 'ok'], 200);
            }else{
                return response()->json(['mensaje' => 'Error al agregar el producto', 'status' => 'error'], 400);
            }
        } catch (Exception $e) {
            return response()->json(['mensaje' => 'Error al agregar el producto'], 403);
        }
    }
}
