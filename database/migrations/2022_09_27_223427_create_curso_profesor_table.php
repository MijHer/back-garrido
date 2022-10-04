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
        Schema::create('curso_profesor', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("curso_id")->unsigned();
            $table->bigInteger("profesor_id")->unsigned();
            $table->bigInteger("grado_id")->unsigned();
            $table->bigInteger("anioacademico_id")->unsigned();

            $table->foreign("curso_id")->references("id")->on("cursos");
            $table->foreign("profesor_id")->references("id")->on("profesors");
            $table->foreign("grado_id")->references("id")->on("grados");
            $table->foreign("anioacademico_id")->references("id")->on("anioacademicos");
            $table->boolean("estado");
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
        Schema::dropIfExists('curso_profesor');
    }
};
