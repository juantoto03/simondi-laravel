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
        Schema::create('servidores', function (Blueprint $table) {
            $table->id();
            $table->string('ser_nombre');
            $table->string('ser_serial');
            $table->string('ser_macadd');
            $table->string('ser_ip');
            $table->string('ser_so');
            $table->date('ser_alta');
            $table->date('ser_baja')->nullable();
            $table->unsignedBigInteger('ser_estatus_id');
            $table->unsignedBigInteger('ser_modelo_id');
            $table->timestamps();

            // Definición de las claves foráneas si es necesario
            $table->foreign('ser_estatus_id')->references('id')->on('estatuses');
            $table->foreign('ser_modelo_id')->references('id')->on('modelos');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servidores');
    }
};
