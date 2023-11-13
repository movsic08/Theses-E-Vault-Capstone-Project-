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
        Schema::create('docu_posts', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('user_id');
            $table->string('reference');
            $table->string('course');
            $table->string('title');
            $table->string('format');
            $table->string('document_type');
            $table->string('date_of_approval');
            $table->string('physical_description');
            $table->string('language');
            $table->string('panel_chair');
            $table->string('advisor');
            $table->string('panel_member_1');
            $table->string('panel_member_2')->nullable();
            $table->string('panel_member_3')->nullable();
            $table->string('panel_member_4')->nullable();
            $table->text('abstract_or_summary');
            $table->string('keyword_1');
            $table->string('keyword_2');
            $table->string('keyword_3');
            $table->string('keyword_4');
            $table->string('keyword_5')->nullable();
            $table->string('keyword_6')->nullable();
            $table->string('keyword_7')->nullable();
            $table->string('keyword_8')->nullable();
            $table->integer('citation_count')->default(0);
            $table->integer('view_count')->nullable();
            $table->text('recommended_citation');
            $table->string('document_file_url')->nullable();
            $table->string('author_1');
            $table->string('author_2')->nullable();
            $table->string('author_3')->nullable();
            $table->string('author_4')->nullable();
            $table->string('author_5')->nullable();
            $table->string('author_6')->nullable();
            $table->string('author_7')->nullable();
            $table->string('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docu_posts');
    }
};