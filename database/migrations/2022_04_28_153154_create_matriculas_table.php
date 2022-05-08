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
            $table->string('mat_cod_modualar')->nullable();
            $table->string('mat_fecha');
            $table->decimal('mat_costo', 8 ,2);
            $table->string('mat_nivel');
            $table->string('mat_turno');
            $table->string('mat_sec')->nullable();
            $table->string('mat_foto')->nullable();
            $table->string('apo_nom');
            $table->string('apo_app');
            $table->string('apo_apm');
            $table->string('apo_parenteso');
            $table->integer('apo_telf')->nullable();
            $table->integer('apo_dni')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
};
