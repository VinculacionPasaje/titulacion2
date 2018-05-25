<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarioTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',500);
            $table->string('descripcion',500);
            $table->string('hemisemestres',500);
            $table->integer('tamanio')->default(30);
            $table->char('state',1)->default(1);
            $table->integer('salon_id')->unsigned();
            $table->integer('anio_id')->unsigned();
            $table->foreign('salon_id')->references('id')->on('salon_clases')->onDelete('cascade');
            $table->foreign('anio_id')->references('id')->on('anio')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendario');
    }
}
