<?php

use Illuminate\Database\Seeder;

class ProveedoresSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = 'proveedores';
    }
    public function run()
    {
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'nombre' => 'Abarrotes del Centro',
            'direccion' => 'Av. López Mateos #1801',
            'ciudad' => 'Aguascalientes',
            'telefono' => '(449)9105002',
            'fax' => '(449)9105002',
            'correo' => 'abarrotes_centro@outlook.com',
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
    }
}
