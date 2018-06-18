<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturaSemestreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignatura_semestre', function (Blueprint $table) {
            $table->increments('id'); // te crea automaticamente la clave primaria
            $table->integer('asignatura_id')->unsigned();
            $table->integer('semestre_id')->unsigned();
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')
                    ->onDelete('cascade');
            $table->foreign('semestre_id')->references('id')->on('semestres')
                    ->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignatura_semestre');
    }
}
