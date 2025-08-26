<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTDestinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_destinos', function (Blueprint $table) {
            $table->id();

            $table->integer('id_usuario');
            $table->integer('id_custodia');
            $table->integer('id_token');
            $table->date('del_destino');
            $table->string('dehora_destino', 10);
            $table->date('al_destino');
            $table->string('ahora_destino', 10);
            $table->date('fechabaja_destino');
            $table->integer('baja_destino');
            $table->string('obs_destino', 200);
            $table->string('estado_destino', 15);

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
        Schema::dropIfExists('t_destinos');
    }
}
