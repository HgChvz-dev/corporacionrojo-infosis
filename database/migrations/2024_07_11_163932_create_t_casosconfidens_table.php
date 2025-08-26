<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTCasosconfidensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_casosconfidens', function (Blueprint $table) {
            $table->id();

            $table->integer('id_cliente');
            $table->integer('id_tipodenu');
            $table->string('codigo_confiden',35);
            $table->integer('nrocaso_confiden');
            $table->integer('id_departamento');
            $table->string('ciudad_confiden',30);
            $table->string('zona_confiden',30);
            $table->text('sector_confiden');
            $table->string('area_confiden',30);
            $table->string('calle_confiden',30);
            $table->string('direccion_confiden',30);
            $table->mediumText ('detalle_confiden');
            $table->datetime('fecha_confiden');
            $table->string('status',10);
            $table->datetime('fecha_baja');

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
        Schema::dropIfExists('t_casosconfidens');
    }
}
