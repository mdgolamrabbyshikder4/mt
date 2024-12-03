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
        Schema::create('add_click_earns', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->string('title');
        $table->text('description');
        $table->integer('work_vacancy');
        $table->decimal('work_price', 8, 2);
        $table->string('work_img')->nullable();
        $table->boolean('work_approval')->default(1);
        $table->boolean('work_suspand')->default(0);
        $table->string('work_link');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_click_earns');
    }
};
