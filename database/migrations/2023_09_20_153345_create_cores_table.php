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
        Schema::create('cores', function (Blueprint $table) {
            $table->id();
            $table->string('cor_nombre');
            $table->string('cor_serial');
            $table->string('cor_memoria');
            $table->string('cor_cpu');
            $table->integer('cor_puertos');
            $table->string('cor_macadd');
            $table->string('cor_ip');
            $table->string('cor_firmware');
            $table->date('cor_alta');
            $table->date('cor_baja')->nullable();
            $table->unsignedBigInteger('cor_estatus_id');
            $table->unsignedBigInteger('cor_modelo_id');
            $table->timestamps();

            $table->foreign('cor_estatus_id')->references('id')->on('estatuses');
            $table->foreign('cor_modelo_id')->references('id')->on('modelos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cores');
    }
};
