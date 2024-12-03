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
        Schema::create('message_users', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('img_status')->nullable(); // Corrected spelling of 'img_status'
            $table->string('sander_user_name')->nullable(); // Check for spelling (should be 'sender_user_name')
            $table->string('reciver_user_name')->nullable(); // Check for spelling (should be 'receiver_user_name')
            $table->string('reciver_user_img')->nullable(); // Check for spelling (should be 'receiver_user_img')
            $table->string('sender_img')->nullable();
            $table->string('unique_id')->nullable();
            $table->string('datetime')->nullable();
            $table->string('sender_id')->nullable();
            $table->string('reciv_id')->nullable(); // Check for spelling (should be 'receiver_id')
            $table->string('sender_seen')->nullable();
            $table->string('reciv_seen')->nullable(); // Check for spelling (should be 'receiver_seen')
            $table->string('discription')->nullable(); // Check for spelling (should be 'description')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_users');
    }
};
