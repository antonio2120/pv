<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{

    public function up()
    {
       Schema::table('ventas', function (Blueprint $table){
            $table->foreign('product_id')->references('id')
                ->on('productos')->onDelete('cascade');
        });
    }
}
