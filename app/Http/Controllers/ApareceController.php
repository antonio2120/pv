<?php

namespace App\Http\Controllers;
use App\Aparece;

class ApareceController extends Controller {
    public function index()
    {
        $aparece = Aparece::all();
        $title = "Lista de Aparece";
        return view('aparece')
            ->with('aparece', $aparece)
            ->with('title', $title);
    }
}
