<?php

namespace App\Http\Controllers;
use App\Cliente;

class ClientesController extends Controller{
    public function index(){
    	$clientes = Cliente::all();
        $title = "Lista de Clientes";
        return view('clientes')
            ->with('clientes', $clientes)
            ->with('title', $title);
    }

    /*public function delete($producto_id)
    {
        $producto = Producto::find($producto_id);
        if($producto){
            $producto->deleted();
            echo "Producto eliminado";
        }else{
            echo "Producto no existe";
        }
	*/

    public function nuevo()
    {
        $title = "Nuevo Producto";
        return view('clientesNuevo')
            ->with('title', $title);
    }
}
