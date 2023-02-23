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
            $table->bigInteger("curso_id")->unsigned()->nullable();
            $table->bigInteger("profesor_id")->unsigned()->nullable();
            $table->foreign("curso_id")->references("id")->on("cursos")
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreign("profesor_id")->references("id")->on("profesors")
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->integer("grado_id");
            $table->string("seccion");
            $table->integer("anioacademico_id");
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
