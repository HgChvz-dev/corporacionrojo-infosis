<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTCiudadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_ciudades', function (Blueprint $table) {
            $table->id();

            $table->integer('id_empresa');
            $table->string('ciudad_ciudad', 15);
            $table->string('pais_ciudad', 15);
            $table->string('estado_ciudad', 15);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_ciudades');
    }
}
