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
        Schema::create('regulations', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('status')->nullable();
            $table->text('title')->nullable();
            $table->string('issuingAgency')->nullable();
            $table->string('signer')->nullable();
            $table->timestamp('issuedDate')->nullable();
            $table->timestamp('effectiveDate')->nullable();
            $table->string('attachment')->nullable();
            $table->string('download_path')->nullable();
            $table->string('type')->nullable();
            $table->integer('page')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regulations');
    }
};