<?php

use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ventas')->delete();

        DB::table('ventas')->insert([
            'fecha' => '08/05/2019',
            'total' => '200',
            'can_art' => '3',
            'descrip' => 'Productos lacteos',
            
        ]);

               
    }
}

