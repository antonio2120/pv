<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{

    protected $table = 'ventas';
    protected $fillable = ['fecha', 'hora', 'total','empleado_id'];

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