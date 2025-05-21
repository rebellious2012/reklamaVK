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
        Schema::create('payment_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->nullable()->constrained('payments')->onDelete('set null');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('stage_id')->nullable()->constrained('stages')->onDelete('set null');
            $table->foreignId('form_id')->nullable()->constrained('forms')->onDelete('set null');
            $table->decimal('amount', 10, 2); // Сумма платежа
            $table->string('stage')->nullable(); // Этап
            $table->string('status')->default('pending'); // Статус платежа
            $table->text('note')->nullable();
            $table->string('image_path')->nullable(); // Путь к скриншоту
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_user');
    }
};
