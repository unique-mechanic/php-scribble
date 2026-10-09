<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notebooks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name', 100);
            $table->timestamps();
            $table->unique(['user_id', 'name']);
        });

        Schema::table('notes', function (Blueprint $table) {
            $table->foreignId('notebook_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title', 160)->nullable();
            $table->string('type', 30)->default('note');
            $table->string('status', 30)->default('reference');
            $table->string('source_url', 2048)->nullable();
            $table->text('code')->nullable();
            $table->string('language', 30)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropForeign(['notebook_id']);
            $table->dropColumn(['notebook_id', 'title', 'type', 'status', 'source_url', 'code', 'language']);
        });
        Schema::dropIfExists('notebooks');
    }
};
