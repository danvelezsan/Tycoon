<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->integer('idOrden')->nullable();
            $table->integer('cedulaPaciente');
            $table->foreign('cedulaPaciente')->references('cedula')->on('pacientes')->onDelete('cascade');
            $table->string('nombrePaciente');
            $table->integer('cedulaMedico');
            $table->string('nombreMedico');
            $table->datetime('fechaHora');
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
        Schema::dropIfExists('citas');
    }
}
