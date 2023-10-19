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
        Schema::create('switches', function (Blueprint $table) {
            $table->id();
            $table->string('swi_nombre');
            $table->string('swi_serial');
            $table->string('swi_memoria');
            $table->string('swi_cpu');
            $table->integer('swi_puertos');
            $table->string('swi_macadd');
            $table->string('swi_ip');
            $table->string('swi_firmware');
            $table->date('swi_alta');
            $table->date('swi_baja')->nullable();
            $table->unsignedBigInteger('swi_estatus_id');
            $table->unsignedBigInteger('swi_modelo_id');
            $table->timestamps();

            $table->foreign('swi_estatus_id')->references('id')->on('estatuses');
            $table->foreign('swi_modelo_id')->references('id')->on('modelos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('switches');
    }
};
