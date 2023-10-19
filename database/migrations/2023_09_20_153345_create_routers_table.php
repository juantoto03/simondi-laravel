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
        Schema::create('routers', function (Blueprint $table) {
            $table->id();
            $table->string('rou_nombre');
            $table->string('rou_serial');
            $table->string('rou_memoria');
            $table->string('rou_cpu');
            $table->integer('rou_puertos');
            $table->string('rou_macadd');
            $table->string('rou_ip');
            $table->string('rou_firmware');
            $table->date('rou_alta');
            $table->date('rou_baja')->nullable();
            $table->unsignedBigInteger('rou_estatus_id');
            $table->unsignedBigInteger('rou_modelo_id');
            $table->timestamps();

            $table->foreign('rou_estatus_id')->references('id')->on('estatuses');
            $table->foreign('rou_modelo_id')->references('id')->on('modelos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routers');
    }
};
