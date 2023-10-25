<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('first_name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_no')->unique()->nullable();
            $table->string('last_name')->nullable();
            $table->string('student_id')->nullable();
            $table->string('staff_id')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('ms_url')->nullable();
            $table->string('bio')->nullable();
            $table->mediumText('bachelor_degree')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->rememberToken();
            $table->timestamps();

            //relationships
            // $table->foreign('role_id')->references('id')->on('account_roles');
            // $table->foreign('bachelor_degree')->references('id')->on('bachelor_degrees')->nullable();
            // $table->foreign('id')->references('user_id')->on('otp_request_history')->nullable();
            // $table->foreign('id')->references('user_id')->on('bookmark_list')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};