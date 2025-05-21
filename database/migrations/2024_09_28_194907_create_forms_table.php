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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('step_user_id')->constrained('step_user')->onDelete('cascade'); // Связь с таблицей step_user
            $table->foreignId('field_id')->constrained('fields')->onDelete('cascade'); // Связь с таблицей fields
            $table->string('field_name'); // Имя поля (slug)
            $table->text('field_value'); // Значение поля
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
