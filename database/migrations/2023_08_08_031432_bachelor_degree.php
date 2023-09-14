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
        Schema::create('bachelor_degrees', function (Blueprint $table) {
            $table->id();
            $table->string('degree_name');
            $table->string('name');
            $table->timestamps();
        });

        //default values
        DB::table('bachelor_degrees')->insert([
            ['degree_name' => 'BSIT', 'name' => 'Bachelor of Science in Information and Technology'],
            ['degree_name' => 'BSME', 'name' => 'Bachelor of Science in Mechanical Engineering '],
            ['degree_name' => 'BSCS', 'name' => 'Bachelor of Science in Computer Science '],
            ['degree_name' => 'BSNUR', 'name' => 'Bachelor of Science in Nursing '],
            ['degree_name' => 'BSPSCY', 'name' => 'Bachelor of Science in Psychology '],
            ['degree_name' => 'MASTER AH', 'name' => 'Master of Arts in History'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};