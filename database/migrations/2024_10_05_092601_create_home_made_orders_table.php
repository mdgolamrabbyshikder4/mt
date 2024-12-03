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
    Schema::create('home_made_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('custom_seller_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('custom_buyer_id')->constrained('users')->onDelete('cascade');
            
            $table->string('custom_food_sell_id');
            
            $table->decimal('custom_total_price', 10, 2);
            $table->decimal('custom_seller_amount', 10, 2);
            $table->decimal('custom_admin_amount', 10, 2);
            $table->string('custom_order_status')->default('pending'); // pending, completed, cancelled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_made_orders');
    }
};
