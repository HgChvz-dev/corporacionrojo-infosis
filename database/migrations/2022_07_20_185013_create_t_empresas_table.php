<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_empresas', function (Blueprint $table) {
            $table->id();
            
            $table->integer('id_ciudad');
            $table->integer('id_region');
            $table->integer('id_token');
            $table->string('nombe_empresa', 60);
            $table->string('razonsocial_empresa', 60);
            $table->string('nit_empresa', 12);
            $table->string('direccion_empresa', 60);
            $table->string('zona_empresa', 60);
            $table->string('contacto_empresa', 60);
            $table->string('telefono_empresa', 26);
            $table->string('imagen_empresa', 50);
            $table->string('prisec_empresa',20);
            $table->string('estado_empresa', 15);

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
        Schema::dropIfExists('t_empresas');
    }
}
