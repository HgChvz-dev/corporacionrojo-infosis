<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTAsignamenurptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_asignamenurpts', function (Blueprint $table) {
            $table->id();

            $table->integer('id_user');
            $table->string('id_menurpt');
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
        Schema::dropIfExists('t_asignamenurpts');
    }
}
