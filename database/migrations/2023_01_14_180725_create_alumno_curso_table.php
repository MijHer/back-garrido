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
            $table->bigInteger("alumno_id")->unsigned()->nullable();
            $table->bigInteger("curso_id")->unsigned()->nullable();
            
            $table->foreign("alumno_id")->references("id")->on("alumnos")
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign("curso_id")->references("id")->on("cursos")
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->integer('anioacademico_id');
            $table->integer('profesor_id');
            $table->decimal('nota1', 10, 2);
            $table->decimal('nota2', 10, 2);
            $table->decimal('nota3', 10, 2);
            $table->decimal('nota4', 10, 2);
            $table->decimal('nota5', 10, 2);
            $table->decimal('nota6', 10, 2);
            $table->decimal('promedio', 10, 2);
            $table->date("fecha");
            $table->time('hora');
            $table->string('obs')->nullable();
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
