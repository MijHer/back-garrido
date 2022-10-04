<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("alumno_id")->unsigned();
            $table->bigInteger("curso_id")->unsigned();
            $table->bigInteger("anioacademico_id")->unsigned();

            $table->foreign("alumno_id")->references("id")->on("alumnos");
            $table->foreign("curso_id")->references("id")->on("cursos");
            $table->foreign("anioacademico_id")->references("id")->on("anioacademicos");
            $table->dateTime('hora');
            $table->boolean('asistencia');
            $table->boolean('falta');
            $table->boolean('tardanza');
            $table->boolean('permiso');
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
        Schema::dropIfExists('asistencias');
    }
};