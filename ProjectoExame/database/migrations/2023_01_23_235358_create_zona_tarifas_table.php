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
        Schema::create('zona_tarifas', function (Blueprint $table) {
            $table->id();
            $table->foreign('zona_id')->references('id')->on('zonas');
            $table->foreign('tarifa_id')->references('id')->on('tarifas');
            $table->dateTime('data_entrada');
            $table->dateTime('data_saida');
            $table->string('modalidade');
            $table->integer('tamanho_frota');
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
        Schema::dropIfExists('zona_tarifas');
    }
};
