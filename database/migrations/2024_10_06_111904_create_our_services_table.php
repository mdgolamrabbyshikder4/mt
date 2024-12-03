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
        Schema::create('our_services', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->string('title');
        $table->text('description');
        $table->decimal('price', 8, 2);
        $table->string('image')->nullable();
        $table->integer('processing_time');
        $table->string('cupon_code')->nullable();
        $table->decimal('cupon_discount', 8, 2)->default(0);
        $table->string('demo_link')->nullable(); // New demo_link field added
        $table->timestamps();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_services');
    }
};
