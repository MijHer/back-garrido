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
        Schema::create('grados', function (Blueprint $table) {
            $table->id();
            $table->string('gra_nom');
            $table->string('gra_detalle')->nullable();
            $table->timestamps();
        });
        Schema::table('matriculas', function (Blueprint $table){
            $table->unsignedBigInteger('grado_id')->nullable();
            $table->foreign('grado_id')->references('id')->on('grados')
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
            $table->dropForeign('matriculas_grado_id_foreign');
            $table->dropColumn('grado_id');
        });
        Schema::dropIfExists('grados');
    }
};
