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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('pago_fecha');
            $table->decimal('pago_monto', 8, 2);
            $table->string('pago_concepto');
            $table->string('pago_periodo');
            $table->timestamps();
        });
        Schema::table('matriculas', function (Blueprint $table){
            $table->unsignedBigInteger('pago_id')->nullable();
            $table->foreign('pago_id')->references('id')->on('pagos')
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
            $table->dropForeign('matriculas_pago_id_foreign');
            $table->dropColumn('pago_id');
        });
        Schema::dropIfExists('pagos');
    }
};
