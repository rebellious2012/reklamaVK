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
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('label');  // название поля (например, "Ваше имя")
            $table->string('type');  // тип поля (например, input, textarea)
            $table->string('placeholder')->nullable(); // Добавляем новое поле
            $table->integer('position')->nullable();   // позиция поля в шаге
            $table->string('slug')->unique()->nullable();  // системное имя поля (slug)
            $table->json('options')->nullable();  // дополнительные параметры (например, выбор опций для select)
            $table->text('note')->nullable();  // Добавляем поле note
            $table->foreignId('parent_id')->nullable()->constrained('fields')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
