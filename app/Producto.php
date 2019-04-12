<?php

namespace App\product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'productos';
    protected $fillable = ['nombre', 'descripcion', 'precio','costo'];

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