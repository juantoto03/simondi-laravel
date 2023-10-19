<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('firewalls', function (Blueprint $table) {
            $table->id();
            $table->string('fir_nombre');
            $table->string('fir_serial');
            $table->string('fir_memoria', 10, 2);
            $table->string('fir_cpu', 10, 2);
            $table->integer('fir_puertos');
            $table->string('fir_macadd', 17);
            $table->string('fir_ip', 15);
            $table->string('fir_firmware');
            $table->date('fir_alta');
            $table->unsignedBigInteger('fir_estatus_id');
            $table->unsignedBigInteger('fir_modelo_id');
            $table->timestamps();

            $table->foreign('fir_estatus_id')->references('id')->on('estatuses');
            $table->foreign('fir_modelo_id')->references('id')->on('modelos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firewalls');
    }
};
