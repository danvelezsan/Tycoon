<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->boolean('verificacionUsada');
            $table->date('fecha');
            $table->string('especialidad');
            $table->integer('cedulaPaciente');
            $table->foreign('cedulaPaciente')->references('cedula')->on('pacientes')->onDelete('cascade');
            $table->integer('cedulaMedico');
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
        Schema::dropIfExists('ordens');
    }
}
