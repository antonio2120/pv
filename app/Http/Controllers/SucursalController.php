<?php

namespace App\Http\Controllers;
use App\Sucursal;

class SucursalController extends Controller{
    public function index(){
    $sucursal = Sucursal::all();
    $title = "Sucursales ";
    return view('sucursal')
   ->with('sucursal', $sucursal)
  ->with('title', $title);
    }
}
