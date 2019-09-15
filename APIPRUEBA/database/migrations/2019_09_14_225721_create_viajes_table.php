<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            //una tabla para viajes
            $table->increments('id');
            $table->timestamp('fecha');
            $table->string('pais');
            $table->string('ciudad');
            $table->string('email');
            $table->timestamps();
            //se especifica la referencia a la tabla usuarios, en donde se haran registros dependiendo si existen los emails en la tabla usuario
            $table->foreign('email')
                ->references('email')->on('usuarios')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viajes');
    }
}
