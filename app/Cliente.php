<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    protected $table = 'clientes';
    protected $fillable = ['nombres', 'apaterno', 'amaterno', 'direccion', 'telefono', 'correo'];
}
