<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_bitacoras', function (Blueprint $table) {
            $table->id();

            $table->integer('id_rrhh');
            $table->datetime('fechorbit_bitacora',0);
            $table->text('detalle_bitacora');
            $table->text('img_bitacora',255);
            $table->string('obs_bitacora',100);
            $table->string('status',10);
            $table->date('fecha_baja',0);

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
        Schema::dropIfExists('t_bitacoras');
    }
}
