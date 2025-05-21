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
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('position');
            $table->string('group_name')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('short_content')->nullable();
            $table->text('description')->nullable();
            $table->text('svg_code')->nullable();
            $table->string('color')->nullable();
            $table->string('image_path')->nullable(); // Добавлено поле для изображения
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stages');
    }
};
