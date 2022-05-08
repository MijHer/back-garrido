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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('cur_nom');
            $table->string('cur_descripcion')->nullable();
            $table->string('cur_grado');
            $table->string('cur_anio');
            $table->timestamps();
        });        
        Schema::table('notacursos', function (Blueprint $table){
            $table->unsignedBigInteger('curso_id')->nullable()->after('id');
            $table->foreign('curso_id')->references('id')->on('cursos')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::table('notacursos', function (Blueprint $table){
            $table->dropForeign('notacursos_curso_id_foreign');
            $table->dropColumn('curso_id');
        });
        Schema::dropIfExists('cursos');
    }
};
