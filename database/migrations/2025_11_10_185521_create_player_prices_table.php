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
        Schema::create('player_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')->constrained('player')->onDelete('cascade');
            $table->integer('price');
            $table->enum('platform', ['pc', 'ps', 'xbox']);
            $table->string('price_type');
            $table->date('recorded_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_prices');
    }
};
