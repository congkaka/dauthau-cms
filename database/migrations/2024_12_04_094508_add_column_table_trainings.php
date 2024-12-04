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
        Schema::table('trainings', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->text('intro')->nullable();
            $table->jsonb('description')->nullable();
            $table->string('price')->nullable();
            $table->string('lesson')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropColumn(['title', 'intro', 'price', 'description', 'lesson']);
        });
    }
};
