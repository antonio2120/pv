
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    public function up()
    {
        Schema::table('productos', function (Blueprint $table){
            $table->foreign('proveedor_id')->references('id')
                ->on('proveedores')->onDelete('cascade');
        });

        // colocar aquí las nuevas llaves foraneas
    }

    public function down()
    {
        Schema::table('productos', function (Blueprint $table){
            $table->dropForeign('productos_proveedor_id_foreign');

        });
    }
}
