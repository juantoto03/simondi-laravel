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
        Schema::create('modelos', function (Blueprint $table) {
            $table->id();
            $table->string('mod_nombre');
            $table->unsignedBigInteger('mod_tipo_id');
            $table->unsignedBigInteger('mod_marca_id');
            $table->timestamps();

            $table->foreign('mod_tipo_id')->references('id')->on('tipos');
            $table->foreign('mod_marca_id')->references('id')->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelos');
    }
};
