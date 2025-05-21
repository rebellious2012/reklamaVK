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
        Schema::create('stage_step', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stage_id')->constrained()->onDelete('cascade');  // Связь с таблицей этапов
            $table->foreignId('step_id')->constrained()->onDelete('cascade');  // Связь с таблицей шагов
            $table->integer('position')->nullable();  // Позиция шага в рамках конкретного этапа
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stage_step');
    }
};
