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
        Schema::create('apoderados', function (Blueprint $table) {
            $table->id();
            $table->string('apo_nom');
            $table->string('apo_app');
            $table->string('apo_apm');
            $table->integer('apo_dni')->unique();
            $table->integer('apo_telf')->nullable();
            $table->string('apo_dir');
            $table->string('apo_fnac');
            $table->string('apo_vinculo');
            $table->string('apo_grado_inst')->nullable();
            $table->boolean('apo_estado');
            $table->timestamps();
        });
        Schema::table('matriculas', function (Blueprint $table) {
            $table->unsignedBigInteger('apoderado_id')->nullable();
            $table->foreign('apoderado_id')->references('id')->on('apoderados')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
        });
        Schema::table('alumnos', function (Blueprint $table) {
            $table->unsignedBigInteger('apoderado_id')->nullable();
            $table->foreign('apoderado_id')->references('id')->on('apoderados')
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
        Schema::table('matriculas', function (Blueprint $table) {
            $table->dropForeign('matriculas_apoderado_id_foreign');
            $table->dropColumn('apoderado_id');
        });
        Schema::table('alumnos', function (Blueprint $table) {
            $table->dropForeign('alumnos_apoderado_id_foreign');
            $table->dropColumn('apoderado_id');
        });
        Schema::dropIfExists('apoderados');
    }
};
