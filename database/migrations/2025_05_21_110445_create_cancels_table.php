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
        Schema::create('cancels', function (Blueprint $table) {
            $table->id();
            $table->string('reason');
            $table->text('details')->nullable();
            $table->string('file_path')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancels');
    }
};
