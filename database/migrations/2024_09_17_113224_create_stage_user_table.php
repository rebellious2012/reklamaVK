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
        Schema::create('stage_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('stage_id')->constrained()->onDelete('cascade');
            $table->decimal('price', 8, 2)->nullable(); // Поле для стоимости
            $table->string('status')->default('active'); // Добавляем строковое поле для статуса
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stage_user');
    }
};
