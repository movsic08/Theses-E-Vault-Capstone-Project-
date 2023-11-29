<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrowers_logbooks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('author');
            $table->string('reference');
            $table->string('colletion');
            $table->string('course_year_level');
            $table->string('title');
            $table->string('category');
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowers_logbooks');
    }
};