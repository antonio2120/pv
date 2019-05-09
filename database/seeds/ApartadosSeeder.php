<?php

use Illuminate\Database\Seeder;

class ApartadosSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = 'apartado';
    }
    public function run()
    {
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'clientes_id' => App\Cliente::all()->random()->id,
            'fecha_inicio' => '2019-04-14',
            'fecha_fin' => '2019-04-20',
            'anticipo' => 200,
            'total' => 500,
            'empleados_id' => App\Empleado::all()->random()->id,
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
    }
}
