<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTRrhhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_rrhhs', function (Blueprint $table) {
            $table->id();

            $table->string('codigo_rrhh',35);
            $table->string('nomape_rrhh',60);
            $table->string('ci_rrhh',15);
            $table->string('telefono_rrhh',17);
            $table->string('email_rrhh',100);
            $table->string('foto_rrhh',100);
            $table->string('alias_rrhh',20);
            $table->string('cargo_rrhh',60);
            $table->string('ciudad_rrhh',12);
            $table->dateTime('fechaingreso_rrhh',0);
            $table->dateTime('fechabaja_rrhh',0);
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
        Schema::dropIfExists('t_rrhhs');
    }
}
