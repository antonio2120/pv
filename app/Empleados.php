<?php

namespace App\product;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{

    protected $table = 'empleados';
    protected $fillable = ['nombre', 'apellido', 'nombreUsuario','password'];

    /*public function collection(){
        return $this->belongsTo(Collection::class);
    }

    public function pictures(){
        return $this->hasMany(Picture::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }*/

}