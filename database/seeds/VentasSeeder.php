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
            'fecha' => '08/05/2019',
            'hora' => '14:00'
            'total' => '200',
            'empleado_id' => '4'
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
    }
}
