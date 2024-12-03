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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User who adds the product
            $table->string('product_name');
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->decimal('price', 10, 2);  // 10 digits in total, 2 after decimal
            $table->string('contact_info');
            $table->string('location');
            $table->string('tag');
            $table->boolean('sales_type')->default(0); // 0: Not sold, 1: Sold
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
