<?php

use Illuminate\Database\Seeder;

class VentasSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = 'ventas';
    }
    public function run()
    {
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'fecha' => '2012-02-29',
            'hora' => '14:00',
            'total' => 200.5,
            'empleado_id' => App\Empleado::all()->random()->id,
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);

        DB::table($this->table)->insert([
            'fecha' => '2012-03-05',
            'hora' => '12:00',
            'total' => 89.70,
            'empleado_id' => App\Empleado::all()->random()->id,
            'created_at' => '2019-05-16',
            'updated_at' => '2019-05-16',
        ]);

        DB::table($this->table)->insert([
            'fecha' => '2012-05-05',
            'hora' => '13:35',
            'total' => 170.5,
            'empleado_id' => App\Empleado::all()->random()->id,
            'created_at' => '2019-05-16',
            'updated_at' => '2019-05-16',
        ]);

        DB::table($this->table)->insert([
            'fecha' => '2012-06-03',
            'hora' => '10:40',
            'total' => 5500,
            'empleado_id' => App\Empleado::all()->random()->id,
            'created_at' => '2019-05-16',
            'updated_at' => '2019-05-16',
        ]);
    }
}
