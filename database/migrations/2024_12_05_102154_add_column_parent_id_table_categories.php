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
        Schema::table('categories', function (Blueprint $table) {
            // $table->integer('parent_id')->nullable();
            $table->foreignId('parent_id')->nullable() // Cột parent_id
            ->constrained('categories') // Tham chiếu tới bảng 'categories'
            ->onDelete('cascade'); // Thêm ON DELETE CASCADE
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('parent_id');
        });
    }
};
