<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre', 'descripcion', 'precio','costo','proveedor_id', 'categoria_id'];

   /* public function collection(){
        return $this->belongsTo(Collection::class);
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
