<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTTransitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_transitos', function (Blueprint $table) {
            $table->id();

            $table->integer('id_regsegs');
            $table->string('propietario_transito',60);
            $table->string('ciprop_transito',15);
            $table->string('direccion_transito',100);
            $table->string('ruat_transito',20);
            $table->string('modelo_transito',20);
            $table->string('anio_transito',4);

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
        Schema::dropIfExists('t_transitos');
    }
}
