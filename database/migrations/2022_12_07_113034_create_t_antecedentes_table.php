<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTAntecedentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_antecedentes', function (Blueprint $table) {
            $table->id();

            $table->integer('id_regsegs');
            $table->integer('id_entidad');
            $table->string('nrocaso_complementos',15);
            $table->text('detalle_complementos');
            $table->date('inipro_complementos');
            $table->date('finpro_complementos');
            $table->string('sentencia_complementos',100);
            $table->string('otros_complementos',50);
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
        Schema::dropIfExists('t_antecedentes');
    }
}
