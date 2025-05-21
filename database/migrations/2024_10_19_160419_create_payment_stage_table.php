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
        Schema::create('payment_stage', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->constrained('payments')->onDelete('cascade');
            $table->foreignId('stage_id')->nullable()->constrained('stages')->onDelete('set null');
            $table->foreignId('field_id')->nullable()->constrained('fields')->onDelete('set null'); // Добавляем связь с полем
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_stage');
    }
};
