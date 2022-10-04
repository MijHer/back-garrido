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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->string('mat_cod_modular')->nullable();
            $table->dateTime('mat_fecha');
            $table->decimal('mat_costo', 8 ,2);
            $table->string('mat_nivel');
            $table->string('mat_turno');
            $table->boolean('mat_repit');
            $table->boolean('mat_estado');
            $table->timestamps();
        });
        Schema::table('pagos', function (Blueprint $table) {
            $table->unsignedBigInteger('matricula_id')->nullable();
            $table->foreign('matricula_id')->references('id')->on('matriculas')
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
        Schema::table('pagos', function (Blueprint $table) {
            $table->dropForeign('pagos_matricula_id_foreign');
            $table->dropColumn('matricula_id');
        });
        Schema::dropIfExists('matriculas');
    }
};
