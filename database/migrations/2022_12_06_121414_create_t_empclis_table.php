<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTEmpclisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_empclis', function (Blueprint $table) {
            $table->id();

            $table->string('codigocliente_empcli',35);
            $table->string('razonsocial_empcli',100);
            $table->string('nit_empcli',12);
            $table->string('direccion_empcli',100);
            $table->string('telefonos_empcli',30);
            $table->string('logo_empcli',60);
            $table->string('tiposervicio_empcli',60);
            $table->string('telefonocontacto_empcli',8);
            $table->string('nombrecontacto_empcli',60);
            $table->string('cargocontacto_empcli',60);
            $table->string('emailempresa_empcli',100);
            $table->string('emailcontacto_empcli',100);
            $table->string('contrato_empcli',2);
            $table->string('notariadoen_empcli',60);
            $table->string('tipocontrato_empcli',60);
            $table->string('nropodernotarial_empcli',10);
            $table->dateTime('fechainicial_empcli',0);
            $table->dateTime('fechafinal_empcli',0);
            $table->string('imagenescontrato_empcli',100);
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
        Schema::dropIfExists('t_empclis');
    }
}
