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
        Schema::create('alumno_notacurso', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("alumno_id")->unsigned();
            $table->bigInteger("notacurso_id")->unsigned();

            $table->foreign("alumno_id")->references("id")->on("alumnos");
            $table->foreign("notacurso_id")->references("id")->on("notacursos");
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
        Schema::dropIfExists('alumno_notacurso');
    }
};
