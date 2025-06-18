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
        /**
         * zmiana typu dla body
         * ze string
         * na text
         */
        Schema::table('articles', function (Blueprint $table) {
            $table->text('body')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /**
         * Procedura do ew. wycofania zmian
         */
        Schema::table('articles', function (Blueprint $table) {
            $table->string('body')->change();
        });
    }
};
