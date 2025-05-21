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
        Schema::create('field_step', function (Blueprint $table) {
            $table->id();
            $table->foreignId('field_id')->constrained()->onDelete('cascade');  // Внешний ключ для поля
            $table->foreignId('step_id')->constrained()->onDelete('cascade');   // Внешний ключ для шага
            $table->integer('position')->nullable();  // Позиция поля в шаге
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('field_step');
    }
};
