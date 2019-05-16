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
        DB::table($this->table)->insert([
            'nombre' => 'Papeleria El chino',
            'direccion' => 'Santa Monica #01',
            'ciudad' => 'Aguascalientes',
            'telefono' => '(449)914587',
            'fax' => '(449)918745',
            'correo' => 'Chino_PapelM@hotmail.com',
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
        DB::table($this->table)->insert([
            'nombre' => 'Miniuper Kratos',
            'direccion' => 'Fraccionamiento Cruces #256',
            'ciudad' => 'Aguascalientes',
            'telefono' => '(449)974875',
            'fax' => '(449)9156595',
            'correo' => 'Kratos_MS@hotmail.com',
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
        DB::table($this->table)->insert([
            'nombre' => 'Supermercado Las gradas',
            'direccion' => 'Villa Teresa local #04',
            'ciudad' => 'Aguascalientes',
            'telefono' => '(449)985471',
            'fax' => '(449)965842',
            'correo' => 'Super_Gradas@hotmail.com',
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
        
    }
}
