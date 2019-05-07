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
}
