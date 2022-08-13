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
        Schema::create('alumno_curso', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("alumno_id")->unsigned();
            $table->bigInteger("curso_id")->unsigned();

            $table->foreign("alumno_id")->references("id")->on("alumnos");
            $table->foreign("curso_id")->references("id")->on("cursos");

            $table->dateTime('hora');
            $table->string('asistencia');
            $table->string('tardanza');
            $table->string('permiso');
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
        Schema::dropIfExists('alumno_curso');
    }
};
