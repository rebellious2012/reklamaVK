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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('rubric_id')->constrained()->onDelete('cascade');
            $table->string('slug');
            $table->string('name')->nullable();
            $table->longText('content')->nullable();
            $table->text('short_content')->nullable();
            $table->string('image_path')->nullable();
            $table->string('video_link')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->integer('position')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
