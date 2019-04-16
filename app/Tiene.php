<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiene extends Model
{

    protected $table = 'tiene';
    protected $fillable = ['id', 'id_venta', 'codigo_barras','cantidadPro'];
/*
    public function collection(){
        return $this->belongsTo(Collection::class);
    }

    public function pictures(){
        return $this->hasMany(Picture::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
*/

}