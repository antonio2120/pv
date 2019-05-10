<?php

use Illuminate\Database\Seeder;

class ComprasSeeder extends Seeder
{
    protected $table;

    public function __construct()
    {
        $this->table = 'compras';
    }
    public function run()
    {
        DB::table($this->table)->delete();
        DB::table($this->table)->insert([
            
            'fecha' => '2019-05-08',
            'total' => '36',
            'can_art' => '2',
            'descrip' => 'holamundo',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);

        DB::table($this->table)->insert([
            'fecha' => '2019-05-04',
            'total' => '120',
            'can_art' => '7',
            'descrip' => 'holamundox2',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);

        DB::table($this->table)->insert([
            'fecha' => '2019-05-08',
            'total' => '500',
            'can_art' => '1',
            'descrip' => 'holamundox3',
            'created_at' => '2019-05-08',
            'updated_at' => '2019-05-08',
        ]);
    }
}
