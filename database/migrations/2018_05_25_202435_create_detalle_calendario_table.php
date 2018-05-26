<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleCalendarioTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignatura_calendario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dia_semana',500);
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->char('state',1)->default(1);
            $table->integer('calendario_id')->unsigned();
            $table->integer('asignatura_id')->unsigned();
            $table->foreign('calendario_id')->references('id')->on('calendario')->onDelete('cascade');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignatura_calendario');
    }
}
