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
        Schema::create('reported_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docu_post_id');
            $table->unsignedBigInteger('reporter_user_id');
            $table->unsignedBigInteger('reported_user_id');
            $table->unsignedBigInteger('reported_comment_id');
            $table->string('report_title');
            $table->text('report_other_context')->nullable();
            $table->string('report_status');
            $table->timestamps();

            $table->foreign('reported_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reported_comments');
    }
};
