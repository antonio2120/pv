<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{

    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('idVenta');
            $table->date('fecha');
            $table->float('total');
            $table->float('can_art');
            $table->string('descrip');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
