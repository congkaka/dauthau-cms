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
        Schema::create('booking_consultings', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->integer('gender')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->integer('consulting_id');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_consultings');
    }
};
