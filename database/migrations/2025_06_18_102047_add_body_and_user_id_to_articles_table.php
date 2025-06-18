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
        Schema::table('articles', function (Blueprint $table) {
            // Dodaj kolumnę body, jeśli jej brakuje (ale widzę, że masz ją już jako string, lepiej zmień na text w pierwszej migracji lub zostaw)
            // Jeśli chcesz zmienić typ na text, zrób to osobną migracją lub tutaj przez change()

            // Dodaj kolumnę user_id, jeśli jej nie ma
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
