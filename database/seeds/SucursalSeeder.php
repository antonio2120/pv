<?php

use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = 'sucursal';
    }
    public function run()
    {
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'nombre' => 'Teckart',
            'direccion' => 'Songalez Oriente',
            'telefono' => '9784888',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);
    }
}
