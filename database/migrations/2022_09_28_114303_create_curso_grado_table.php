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
        Schema::create('curso_grado', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("grado_id")->unsigned();
            $table->bigInteger("curso_id")->unsigned();

            $table->foreign("grado_id")->references("id")->on("grados");                    
            $table->foreign("curso_id")->references("id")->on("cursos");
            $table->string("seccion");
            $table->string("nivel");
            $table->string('anioacademico');
            $table->boolean('estado');
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
        Schema::dropIfExists('curso_grado');
    }
};
