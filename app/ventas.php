<?php
namespace App\product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'ventass';
    protected $fillable = ['fecha', 'hora', 'total','costo'];
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