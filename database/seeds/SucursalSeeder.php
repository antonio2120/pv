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
         DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'nombre' => 'Raime',
            'direccion' => 'costas del Humo',
            'telefono' => '11000',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'nombre' => 'Velstad',
            'direccion' => 'cripta',
            'telefono' => '106065',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'nombre' => 'Industrias Stark',
            'direccion' => 'edificios baxter',
            'telefono' => '91834095',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);
              DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'nombre' => 'Gigante',
            'direccion' => 'jotunheim',
            'telefono' => '106065',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'nombre' => 'WarGod',
            'direccion' => 'sparta',
            'telefono' => '913455',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);
    }
}
