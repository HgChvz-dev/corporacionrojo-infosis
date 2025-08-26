<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTCasosapoyosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_casosapoyos', function (Blueprint $table) {
            $table->id();

            $table->integer('id_cliente');
            $table->integer('id_tipodenu');
            $table->string('codigo_apoyo',35);
            $table->integer('nrocaso_apoyo');
            $table->integer('id_departamento');
            $table->string('ciudad_apoyo',30);
            $table->string('zona_apoyo',30);
            $table->text('sector_apoyo');
            $table->string('area_apoyo',30);
            $table->string('calle_apoyo',30);
            $table->string('direccion_apoyo',30);
            $table->mediumText ('detalle_apoyo');
            $table->datetime('fecha_apoyo');
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
        Schema::dropIfExists('t_casosapoyos');
    }
}
