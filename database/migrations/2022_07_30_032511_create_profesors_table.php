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
        Schema::create('profesors', function (Blueprint $table) {
            $table->id();
            $table->string('pro_nom');
            $table->string('pro_app');
            $table->string('pro_apm');
            $table->string('pro_dire')->nullable();
            $table->integer('pro_telf');
            $table->string('pro_sexo')->nullable();
            $table->integer('pro_dni')->unique();
            $table->string('pro_grado_instruccion');
            $table->string('pro_especialidad')->nullable();
            $table->string('pro_pais')->nullable();
            $table->string('pro_fnac')->nullable();
            $table->string('pro_distrito');
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table){
            $table->unsignedBigInteger('profesor_id')->nullable();
            $table->foreign('profesor_id')->references('id')->on('profesors')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
        Schema::table('notacursos', function (Blueprint $table){
            $table->unsignedBigInteger('profesor_id')->nullable();
            $table->foreign('profesor_id')->references('id')->on('profesors')
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
            $table->dropForeign('users_profesor_id_foreign');
            $table->dropColumn('profesor_id');
        });
        Schema::table('notacursos', function (Blueprint $table){
            $table->dropForeign('notacursos_profesor_id_foreign');
            $table->dropColumn('profesor_id');
        });
        Schema::dropIfExists('profesors');
    }
};
