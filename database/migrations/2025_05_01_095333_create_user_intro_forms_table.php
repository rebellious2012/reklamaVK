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
        Schema::create('user_intro_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('account_type', ['advertiser', 'agency'])->default('advertiser');
            $table->string('link_page')->nullable();
            $table->string('link_group')->nullable();
            $table->string('country')->nullable();
            $table->string('currency')->nullable();
            $table->string('inn')->nullable();
            $table->string('fio')->nullable();
            $table->string('email')->nullable();
            $table->string('legal_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_intro_forms');
    }
};
