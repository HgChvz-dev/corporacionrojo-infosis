<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTRegsegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_regsegs', function (Blueprint $table) {
            $table->id();

            $table->integer('id_caso');
            $table->integer('id_empresa');
            $table->integer('id_empcli');
            $table->integer('id_usuario',);
            $table->date('fecha_regseg',0);
            $table->string('horainicio_regseg',8);
            $table->string('horafinal_regseg',8);
            $table->text('detalle_regseg');
            $table->string('lugar_regseg',100);
            $table->integer('id_ciudad');
            $table->string('poblacion_regseg',50);
            $table->string('area_regseg',50);
            $table->string('zona_regseg',50);
            $table->string('geolat_regseg',16);
            $table->string('geolon_regseg',16);
            $table->string('placa_regseg',10);
            $table->string('marca_regseg',25);
            $table->string('color_regseg',25);
            $table->string('modelo_regseg',25);
            $table->string('adicional_regseg',50);
            $table->string('imagenes_regseg',100);
            $table->string('prioridad_regseg',10);
            $table->integer('voboemp_regseg');
            $table->integer('vobocli_regseg');
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
        Schema::dropIfExists('t_regsegs');
    }
}
