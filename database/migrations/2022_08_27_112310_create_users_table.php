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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('usu_dni');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('usu_user');
            $table->string('password');
            $table->string('usu_dir');
            $table->integer('usu_telf');
            $table->dateTime('usu_rgst');
            $table->timestamps();
        });
        Schema::table('alumnos', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
        Schema::table('profesors', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::table('alumnos', function (Blueprint $table) {
            $table->dropForeign('alumnos_user_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::table('profesors', function (Blueprint $table) {
            $table->dropForeign('profesors_user_id_foreign');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('users');
    }
};
