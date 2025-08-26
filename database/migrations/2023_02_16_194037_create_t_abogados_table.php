<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTAbogadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_abogados', function (Blueprint $table) {
            $table->id();

            $table->integer('id_caso');
            $table->date('fechaini_abogado');
            $table->string('fisasig_abogado',100);
            $table->text('detalle_abogado');
            $table->string('obs_abogado',150);
            $table->string('status',10);
            $table->date('fecha_baja');

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
        Schema::dropIfExists('t_abogados');
    }
}
