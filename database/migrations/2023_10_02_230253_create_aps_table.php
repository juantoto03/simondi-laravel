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
        Schema::create('aps', function (Blueprint $table) {
            $table->id();
            $table->string('ap_nombre');
            $table->string('ap_serial');
            $table->string('ap_macadd');
            $table->string('ap_ip');
            $table->string('ap_firmware');
            $table->date('ap_alta');
            $table->date('ap_baja')->nullable();
            $table->unsignedBigInteger('ap_estatus_id');
            $table->unsignedBigInteger('ap_modelo_id');
            $table->timestamps();

            $table->foreign('ap_estatus_id')->references('id')->on('estatuses');
            $table->foreign('ap_modelo_id')->references('id')->on('modelos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aps');
    }
};
