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
    Schema::create('bookmark_list', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('docu_post_id');
        $table->string('reference');
        $table->timestamps();

        // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        // $table->foreign('docu_post_id')->references('id')->on('docu_posts')->onDelete('cascade');
        // $table->foreign('reference')->references('reference')->on('docu_posts')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookmark_list');
    }
};