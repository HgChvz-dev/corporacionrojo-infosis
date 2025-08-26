<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTAdminisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_adminis', function (Blueprint $table) {
            $table->id();

            $table->integer('id_regsegs');
            $table->integer('id_entidad');
            $table->string('nrocaso_admini',15);
            $table->text('detalle_admini');
            $table->date('inipro_admini',0);
            $table->date('finpro_admini',0);
            $table->string('sentencia_admini',100);
            $table->string('otros_admini',50);
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
        Schema::dropIfExists('t_adminis');
    }
}
