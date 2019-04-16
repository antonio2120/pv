<?php

namespace App\Aparece;

use Illuminate\Database\Eloquent\Model;

class Aparece extends Model
{

    protected $table = 'aparece';
    protected $fillable = ['apartado_id', 'codigo_barras', 'cantidadxPro'];

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