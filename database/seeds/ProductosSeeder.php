<?php

use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = 'productos';
    }
    public function run()
    {
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            'nombre' => 'Agua 1.5 lts.',
            'descripcion' => 'Agua 1.5 lts. De Manantial',
            'precio' => 10.50,
            'costo' => 9.50,
            'proveedor_id' => App\Proveedor::all()->random()->id,
            'categoria_id' => App\Categoria::all()->random()->id,
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);

        DB::table($this->table)->insert([
            'nombre' => 'Pinzas Electricas.',
            'descripcion' => 'Pinzas Electricas marca X.',
            'precio' => 60.50,
            'costo' => 50.50,
            'proveedor_id' => App\Proveedor::all()->random()->id,
            'categoria_id' => App\Categoria::all()->random()->id,
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);

        DB::table($this->table)->insert([
            'nombre' => 'Pintura Blanca 18 Lts.',
            'descripcion' => 'Pintura Blanca 18 Lts. marca Berel.',
            'precio' => 60.50,
            'costo' => 50.50,
            'proveedor_id' => App\Proveedor::all()->random()->id,
            'categoria_id' => App\Categoria::all()->random()->id,
            'created_at' => '2019-04-16',
            'updated_at' => '2019-04-16',
        ]);
    }
}
