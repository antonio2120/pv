<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = 'categorias';
    }
    public function run()
    {
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'nombre' => 'Abarrotes',
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
        DB::table($this->table)->insert([
            'nombre' => 'Ferreterias',
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
        DB::table($this->table)->insert([
            'nombre' => 'Vinos y Licores',
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
        DB::table($this->table)->insert([
            'nombre' => 'Hogar',
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
    }
}
