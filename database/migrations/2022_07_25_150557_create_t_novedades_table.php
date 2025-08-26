<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTNovedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_novedades', function (Blueprint $table) {
            $table->id();

            $table->integer('id_empresa');
            $table->integer('id_custodia');
            $table->integer('id_cargo');
            $table->integer('id_usuario');
            $table->integer('id_token');
            $table->string('nombrev_novedad', 60);
            $table->string('civ_novedad', 15);
            $table->string('motivov_novedad', 200);
            $table->string('aquienv_novedad', 60);
            $table->string('lugarv_novedad', 50);
            $table->text('detalle_novedad');
            $table->string('observacion_novedades',200);
            $table->date('fecha_novedad');
            $table->string('hora_novedad', 10);
            $table->integer('voboemp_novedad');
            $table->integer('vobocus_novedad');
            $table->string('estado_novedad',15);

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
        Schema::dropIfExists('t_novedades');
    }
}
