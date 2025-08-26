<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTOperativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_operativos', function (Blueprint $table) {
            $table->id();

            $table->integer('id_caso');
            $table->datetime('fechaini_operativo',0);
            $table->datetime('fechafin_operativo',0);
            $table->string('numero_operativo',15);
            $table->integer('encargado_operativo');
            $table->integer('participo_operativo');
            $table->string('geolatlong_operativo',60);
            $table->text('detalle_operativo');
            $table->string('obs_operativo',100);
            $table->string('status',10);
            $table->date('fecha_baja',);

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
        Schema::dropIfExists('t_operativos');
    }
}
