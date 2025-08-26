<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTCustodiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_custodias', function (Blueprint $table) {
            $table->id();

            $table->integer('id_empseg');
            $table->integer('id_token');
            $table->string('codigo_custodia', 20);
            $table->string('empresa_custodia', 60);
            $table->string('razonsocial_custodia', 60);
            $table->string('nit_custodia', 15);
            $table->string('direccion_custodia', 60);
            $table->string('zona_custodia', 60);
            $table->string('telefono_custodia', 26);
            $table->string('prisuc_custodia', 20);
            $table->integer('zonaarea_custodia');
            $table->string('logo_custodia', 100);
            $table->string('estado_custodia', 15);

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
        Schema::dropIfExists('t_custodias');
    }
}
