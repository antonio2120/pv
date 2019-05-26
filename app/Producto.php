<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Proveedor;
use App\Categoria;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre', 'descripcion', 'precio','costo','proveedor_id', 'categoria_id'];

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
/*
    public function pictures(){
        return $this->hasMany(Picture::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
*/
}
