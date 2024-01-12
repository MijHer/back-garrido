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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('alu_nom');
            $table->string('alu_app');
            $table->string('alu_apm');
            $table->string('alu_fnac');
            $table->string('alu_tipo_doc');
            $table->string('alu_nmr_doc')->unique();
            $table->string('alu_pais');
            $table->string('alu_departamento');
            $table->string('alu_provincia');
            $table->string('alu_distrito');          
            $table->string('alu_sexo');
            $table->string('alu_nom_madre');
            $table->string('alu_app_madre');
            $table->string('alu_apm_madre');
            $table->string('alu_tipo_doc_madre');
            $table->string('alu_dni_madre')->unique();
            $table->string('alu_civil_madre');
            $table->string('alu_nom_padre');
            $table->string('alu_app_padre');
            $table->string('alu_apm_padre');
            $table->string('alu_tipo_doc_padre');
            $table->string('alu_dni_padre')->unique();
            $table->string('alu_civil_padre');
            $table->timestamps();
        });
        Schema::table('matriculas', function (Blueprint $table) {
            $table->unsignedBigInteger('alumno_id')->after('id')->nullable();
            $table->foreign('alumno_id')->references('id')->on('alumnos')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
        Schema::table('pagos', function (Blueprint $table) {
            $table->unsignedBigInteger('alumno_id')->nullable();
            $table->foreign('alumno_id')->references('id')->on('alumnos')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
        Schema::table('users', function (Blueprint $table)
        {
           $table->unsignedBigInteger('alumno_id')->after('usu_rgst')->nullable();
           $table->foreign('alumno_id')->references('id')->on('alumnos')
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
            $table->dropForeign('matriculas_alumno_id_foreign');
            $table->dropColumn('alumno_id');
        });
        Schema::table('pagos', function (Blueprint $table) {
            $table->dropForeign('pagos_alumno_id_foreign');
            $table->dropColumn('alumno_id');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_alumno_id_foreign');
            $table->dropColumn('alumno_id');
        });
        Schema::dropIfExists('alumnos');
    }
};
