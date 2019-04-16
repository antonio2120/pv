<?php

namespace App\Proveedor;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{

    protected $table = 'proveedores';
    protected $fillable = ['nombre', 'direccion', 'ciudad','telefono', 'fax', 'correo'];

    public function collection(){
        return $this->belongsTo(Collection::class);
    }

    public function pictures(){
        return $this->hasMany(Picture::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

}