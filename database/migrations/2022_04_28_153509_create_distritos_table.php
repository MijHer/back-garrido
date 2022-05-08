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
        Schema::create('distritos', function (Blueprint $table) {
            $table->id();
            $table->string('dist_nom');
            $table->timestamps();
        });
        Schema::table('matriculas', function (Blueprint $table){
            $table->unsignedBigInteger('distrito_id')->nullable();
            $table->foreign('distrito_id')->references('id')->on('distritos')
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
            $table->dropForeign('matriculas_distrito_id_foreign');
            $table->dropColumn('distrito_id');
        });
        Schema::dropIfExists('distritos');
    }
};
