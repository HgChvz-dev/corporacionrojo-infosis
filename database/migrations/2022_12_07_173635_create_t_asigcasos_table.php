<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTAsigcasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_asigcasos', function (Blueprint $table) {
            $table->id();

            $table->integer('id_cliente');
            $table->integer('id_tipodenu');
            $table->string('codigo_asigcasos',15);
            $table->integer('nrocaso_asigcasos');
            $table->integer('id_departamento');
            $table->integer('id_ciudad');
            $table->integer('id_region');
            $table->integer('id_poblacion');
            $table->integer('id_area');
            $table->integer('id_zona');
            $table->string('direccion_asigcasos',80);
            $table->text('detalle_asigcasos');
            $table->dateTime('fecha_asigcasos',0);
            $table->string('status',10);

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
        Schema::dropIfExists('t_asigcasos');
    }
}
