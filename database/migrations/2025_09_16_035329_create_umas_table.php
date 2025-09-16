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
        Schema::create('umas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('velocidad');
            $table->integer('stamina');
            $table->integer('fuerza');
            $table->integer('gutz');
            $table->integer('inteligencia');
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umas');
    }
};
