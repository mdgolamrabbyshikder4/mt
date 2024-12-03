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
        Schema::create('order_messages', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('img_stutas')->nullable();
            $table->string('datetime')->nullable();
            $table->string('freelancer_id')->nullable();
            $table->string('client_id')->nullable();
            $table->string('sender_id')->nullable();
            $table->string('reciv_id')->nullable();
            $table->string('sender_seen')->nullable();
            $table->string('reciv_seen')->nullable();
            $table->string('order_id')->nullable();
            $table->string('discription')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_messages');
    }
};
