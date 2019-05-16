<?php

use Illuminate\Database\Seeder;

class ApareceSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = 'aparece';
    }
    public function run()
    {
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'apartado_id' => App\Apartado::all()->random()->id,
            'codigo_barras' => '9854123',
            'cantidadxPro' => '50',
        ]);
        DB::table($this->table)->insert([
            'apartado_id' => App\Apartado::all()->random()->id,
            'codigo_barras' => '985',
            'cantidadxPro' => '5300',
        ]);
        DB::table($this->table)->insert([
            'apartado_id' => App\Apartado::all()->random()->id,
            'codigo_barras' => '1325',
            'cantidadxPro' => '500',
        ]);


    }
}
