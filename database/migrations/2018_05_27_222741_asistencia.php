<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Asistencia extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firma',500);
            $table->date('fecha');
            $table->time('hora');
            $table->char('justificacion', 1)->nullable(); //Si es 1 si justificó, si es 0 no justifico y si es 2 significa que asistió
            $table->char('state',1)->default(1);
            $table->integer('detalle_calendario_id')->unsigned();
            $table->foreign('detalle_calendario_id')->references('id')->on('asignatura_calendario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistencia');
    }
}
