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
        Schema::create('alumno_profesor', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("alumno_id")->unsigned();
            $table->bigInteger("profesor_id")->unsigned();

            $table->foreign("alumno_id")->references("id")->on("alumnos");                    
            $table->foreign("profesor_id")->references("id")->on("profesors");                    
            $table->string('anioacademico');
            $table->string('curso');
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
        Schema::dropIfExists('alumno_profesor');
    }
};
