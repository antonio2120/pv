<?php

use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = 'clientes';
    }
    public function run()
    {
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'nombres' => 'Juan',
            'apaterno' => 'Bernal',
            'amaterno' => 'Hernandez',
            'direccion' => 'Calle de la luna',
            'telefono' => '4496767396',
            'correo' => 'bernal56@gmail.com',
            'created_at' => '2019-05-07',
            'updated_at' => '2019-05-07',
        ]);
    }
}
