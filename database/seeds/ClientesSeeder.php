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
        DB::table('clientes')->delete();

        DB::table('clientes')->insert([
        	'nombres' => 'Manuel',
        	'apaterno' => 'Lopez',
        	'amaterno' => 'Martinez',
        	'direccion' => 'Calle del Sol',
        	'telefono' => '4494064398',
        	'correo' => 'manuel23@gmail.com',
            'created_at' => '2019-05-07',
            'updated_at' => '2019-05-07',
        ]);

		DB::table('clientes')->insert([
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
