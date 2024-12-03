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
        Schema::create('home_made_food_sell', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('food_name');
            $table->string('food_title');
            $table->text('food_description');
            $table->decimal('food_price', 10, 2);
            $table->decimal('food_delivery_cost', 10, 2);
            $table->integer('food_quantity');
            $table->tinyInteger('food_approve_type')->default(1); // 1=Approved, 0=Suspended
            $table->string('food_location');
            $table->string('food_image')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_made_food_sells');
    }
};
