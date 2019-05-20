<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartado extends Model
{
    protected $table = 'apartados';
    protected $fillable = ['clientes_id', 'fecha_inicio', 'fecha_fin', 'anticipo', 'total', 'empleados_id'];
}