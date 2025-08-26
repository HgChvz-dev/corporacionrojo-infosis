<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTRegionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_regiones', function (Blueprint $table) {
            $table->id();

            $table->integer('id_empresa');
            $table->integer('id_ciudad');
            $table->string('region_region', 25);
            $table->string('estado_region', 15);

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
        Schema::dropIfExists('t_regiones');
    }
}
