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
            // Zmieniamy user_id na add_user_id (najprostsze: usunąć stare, dodać nowe)
            // $table->renameColumn('user_id', 'add_user_id');

            // Dodajemy mod_user_id jako nullable, bo nie zawsze może być
            // $table->unsignedBigInteger('mod_user_id')->nullable()->after('add_user_id');

            // klucze obce do users.id
            // $table->foreign('add_user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('mod_user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['add_user_id']);
            $table->dropForeign(['mod_user_id']);

            $table->dropColumn('mod_user_id');

            $table->renameColumn('add_user_id', 'user_id');
        });
    }
};
