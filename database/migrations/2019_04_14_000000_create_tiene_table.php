<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTieneTable extends Migration
{

    public function up()
    {
        Schema::create('tiene', function (Blueprint $table) {
            $table->bigIncrements('id_tiene');
            $table->bigIncrements('id_venta');
            $table->float('codigo_barras');
            $table->float('cantidadPro');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tiene');
    }
}
