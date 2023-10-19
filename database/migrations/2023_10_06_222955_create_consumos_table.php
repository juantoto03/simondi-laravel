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
        Schema::create('consumos', function (Blueprint $table) {
            $table->id();
            $table->time('con_hora');
            $table->integer('con_dia');
            $table->integer('con_semana');
            $table->string('con_mes');
            $table->integer('con_ano');
            $table->date('con_fecha');
            $table->unsignedBigInteger('con_enlace_id');
            $table->integer('con_consumo');
            $table->timestamps();
            $table->string('con_campus');

            $table->foreign('con_enlace_id')->references('id')->on('enlaces');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumos');
    }
};
