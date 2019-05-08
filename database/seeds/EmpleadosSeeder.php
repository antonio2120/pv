<?php

use Illuminate\Database\Seeder;

class EmpleadosSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = 'empleados';
    }
    public function run()
    {
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'nombre' => 'Luis',
            'apellido' => 'Duron',
            'nombreUsurio' => 'luis01',
            'password' => 'hola123',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);

        DB::table($this->table)->insert([
            'nombre' => 'Alejandra',
            'apellido' => 'Ponce',
            'nombreUsurio' => 'aleP',
            'password' => 'hola321',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);

        DB::table($this->table)->insert([
            'nombre' => 'Daniela',
            'apellido' => 'Garcia',
            'nombreUsurio' => 'dani00',
            'password' => 'hola23',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);
    }
}
