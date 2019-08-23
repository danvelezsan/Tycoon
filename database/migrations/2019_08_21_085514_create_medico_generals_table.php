<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicoGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico_generals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cedula')->unique();
            $table->string('nombre');
            $table->string('apellidos');
            $table->date('fecha_nacimiento');
            $table->string('genero');
            $table->integer('tarjeta_profesional')->unique();
            $table->string('universidad');
            $table->foreign('universidad')->references('nombre')->on('universidads')->onDelete('cascade');
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
        Schema::dropIfExists('medico_generals');
    }
}
