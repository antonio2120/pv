<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aparece extends Model
{

    protected $table = 'aparece';
    protected $fillable = ['apartado_id', 'codigo_barras', 'cantidadxPro'];


}