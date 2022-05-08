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
        Schema::create('anioacademicos', function (Blueprint $table) {
            $table->id();
            $table->string('anio_nom');
            $table->string('anio_detalle')->nullable();
            $table->timestamps();
        });
        Schema::table('matriculas', function (Blueprint $table){
            $table->unsignedBigInteger('anioacademico_id')->nullable();
            $table->foreign('anioacademico_id')->references('id')->on('anioacademicos')
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
        Schema::table('matriculas', function (Blueprint $table){
            $table->dropForeign('matriculas_anioacademico_id_foreign');
            $table->dropColumn('anioacademico_id');
        });
        Schema::dropIfExists('anioacademicos');
    }
};
