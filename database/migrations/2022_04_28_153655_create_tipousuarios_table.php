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
        Schema::create('tipousuarios', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_nom');
            $table->string('tipo_descripcion')->nullable();
            $table->string('estado');
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table){
            $table->unsignedBigInteger('tipousuario_id')->nullable();
            $table->foreign('tipousuario_id')->references('id')->on('tipousuarios')
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
        Schema::table('users', function (Blueprint $table){
            $table->dropForeign('users_tipousuario_id_foreign');
            $table->dropColumn('tipousuario_id');
        });
        Schema::dropIfExists('tipousuarios');
    }
};
