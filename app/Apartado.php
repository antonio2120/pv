<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartado extends Model
{
    protected $table = 'Apartado';
    protected $fillable = ['fecha_inicio', 'fecha_fin', 'anticipo','total'];
}