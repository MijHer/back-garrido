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
            $table->string('anioacademico');
            $table->string('profesor');
            $table->decimal('nota1', 10, 2);
            $table->decimal('nota2', 10, 2);
            $table->decimal('nota3', 10, 2);
            $table->decimal('nota4', 10, 2);
            $table->dateTime("fecha");
            $table->string('obs');
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
