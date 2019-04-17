<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartadoTable extends Migration
{

    public function up()
    {
        Schema::create('apartado', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('clientes_id');
            $table->string('fecha_inicio');
            $table->string('fecha_fin');
            $table->string('anticipo');
            $table->string('total');
            $table->unsignedInteger('empleados_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apartado');
    }
}
