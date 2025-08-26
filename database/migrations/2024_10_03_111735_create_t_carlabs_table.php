<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTCarlabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_carlabs', function (Blueprint $table) {
            $table->id();

            $table->date('fecha_carlab');
            $table->string('cite_carlab',15);
            $table->integer('id_empresa');
            $table->string('ref_carlab',100);
            $table->text('detalle_carlab');
            $table->string('desc_carlab',15);
            $table->string('marca_carlab',15);
            $table->integer('cant_carlab');
            $table->string('envase_carlab',15);
            $table->string('lote_carlab',15);
            $table->date('vence_carlab');
            $table->string('carc_carlab',25);
            $table->string('img1_carlab',100);
            $table->string('img2_carlab',100);
            $table->string('img3_carlab',100);
            $table->string('img4_carlab',100);
            $table->string('img5_carlab',100);
            $table->string('img6_carlab',100);
            $table->string('img7_carlab',100);
            $table->string('img8_carlab',100);
            $table->string('img9_carlab',100);
            $table->string('img10_carlab',100);
            $table->string('img11_carlab',100);
            $table->string('img12_carlab',100);
            $table->string('firma_carlab',100);
            $table->string('cc_carlab',100);
            $table->string('adj_carlab',200);
            $table->string('membrete_carlab',100);
            $table->date('fecres_carlab');
            $table->text('detres_carlab');
            $table->string('pdfres_carlab',100);
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
        Schema::dropIfExists('t_carlabs');
    }
}
