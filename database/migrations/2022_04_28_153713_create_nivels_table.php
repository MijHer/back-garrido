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
        Schema::create('nivels', function (Blueprint $table) {
            $table->id();
            $table->string('niv_nom');
            $table->timestamps();
        });
        Schema::table('grados', function (Blueprint $table){
            $table->unsignedBigInteger('nivel_id')->nullable();
            $table->foreign('nivel_id')->references('id')->on('nivels')
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
        Schema::table('grados', function (Blueprint $table){
            $table->dropForeign('grados_nivel_id_foreign');
            $table->dropColumn('nivel_id');
        });
        Schema::dropIfExists('nivels');
    }
};
