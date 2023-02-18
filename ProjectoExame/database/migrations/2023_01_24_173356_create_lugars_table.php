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
        Schema::create('lugars', function (Blueprint $table) {
            $table->id();
            $table->integer('n_lugar');
            $table->boolean('estado');
            $table->boolean('vip');
            $table->foreignId('veiculo_id')->nullable();
            $table->foreignId('zona_id')->index();
            $table->foreignId('frota_id')->nullable();
            $table->boolean('bemparado');
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
        Schema::dropIfExists('lugars');
    }
};
