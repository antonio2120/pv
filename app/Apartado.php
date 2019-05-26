<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;
use App\Empleado;

class Apartado extends Model
{
    protected $table = 'apartados';
    protected $fillable = ['clientes_id', 'fecha_inicio', 'fecha_fin', 'anticipo', 'total', 'empleados_id'];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
}