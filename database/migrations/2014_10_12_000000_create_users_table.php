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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rol');
            $table->string('approval');
            $table->string('balance');
            $table->string('img')->nullable();
            $table->string('nid');
            $table->string('nid_img')->nullable();
            $table->string('mobile')->nullable();
            $table->longText('discription')->nullable();
            $table->string('ordar_no')->nullable();
            $table->string('location');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
