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
        Schema::create('provincias', function (Blueprint $table) {
            $table->id();
            $table->string('prov_nom');
            $table->timestamps();
        });
        Schema::table('distritos', function (Blueprint $table){
            $table->unsignedBigInteger('provincia_id')->nullable();
            $table->foreign('provincia_id')->references('id')->on('provincias')
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
        Schema::table('distritos', function (Blueprint $table){
            $table->dropForeign('distritos_provincia_id_foreign');
            $table->dropColumn('provincia_id');
        });
        Schema::dropIfExists('provincias');
    }
};
