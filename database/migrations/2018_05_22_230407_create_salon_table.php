<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salon_clases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('salon_clase',255);
             $table->string('ubicacion',255);
             $table->string('descripcion',255);
            $table->integer('tamanio')->default(30);
            $table->char('disponibilidad',1)->default(1);
            $table->char('state',1)->default(1);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salon_clases');
    }
}
