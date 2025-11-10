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
        Schema::create('prices_trends', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')->constrained('player')->onDelete('cascade');
            $table->integer('price_start');
            $table->integer('price_end');
            $table->decimal('percent_change', 5, 2);
            $table->string('time_range');
            $table->enum('trend', ['up', 'down', 'stable']);
            $table->dateTime('analyzed_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices_trends');
    }
};
