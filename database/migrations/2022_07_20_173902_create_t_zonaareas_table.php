<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTZonaareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_zonaareas', function (Blueprint $table) {
            $table->id();
            
            $table->integer('id_empresa');            
            $table->integer('id_area');
            $table->string('detalle_zonaarea', 30);
            $table->string('estado_zonaarea', 15);

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
        Schema::dropIfExists('t_zonaareas');
    }
}
