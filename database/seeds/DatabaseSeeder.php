<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriasSeeder::class);
        $this->call(ProveedoresSeeder::class);
        $this->call(ProductosSeeder::class);
        $this->call(ClientesSeeder::class);
        $this->call(EmpleadosSeeder::class);
        $this->call(SucursalSeeder::class);
        $this->call(ComprasSeeder::class);
    }
}
