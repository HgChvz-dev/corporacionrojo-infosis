<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTAsignacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_asignaciones', function (Blueprint $table) {
            $table->id();

            $table->integer('id_empcli');
            $table->integer('id_rrhh');
            $table->dateTime('fechaasignado_asignacione',0);
            $table->dateTime('fechabaja_asignacione',0);
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
        Schema::dropIfExists('t_asignaciones');
    }
}
