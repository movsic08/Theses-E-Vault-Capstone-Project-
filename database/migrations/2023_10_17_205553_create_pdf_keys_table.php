<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pdf_keys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('docu_post_id');
            $table->string('keys');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pdf_keys');
    }
};