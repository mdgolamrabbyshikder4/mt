<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('orders', function (Blueprint $table) {
    $table->id(); // Primary key
    
    $table->string('img'); // Image path or URL
    $table->string ('service_id'); // Assuming 'services' table exists
    $table->string('service_review')->nullable(); // Optional, if review might not be added immediately
    $table->text('description'); // Use 'text' for longer descriptions
    
    $table->decimal('order_price', 10, 2); // Order total price
    $table->date('order_date'); // Date when the order was placed
    $table->time('order_time'); // Time when the order was placed
    $table->date('ending_order_date'); // Expected order completion date
    $table->time('ending_order_time'); // Expected order completion time
    
    $table->foreignId('frid')->constrained('users'); // Assuming 'freelancers' table exists
    $table->foreignId('clid')->constrained('users'); // Assuming 'clients' table exists

    $table->decimal('adminprofit', 10, 2); // Admin profit
    $table->decimal('client_pay', 10, 2); // Amount client pays
    $table->decimal('freelancer_pay', 10, 2); // Amount freelancer receives

    $table->string('order_status')->default('0'); // Order status, default is 'pending'
    $table->string('accept_req')->nullable(); // Optional, if accept request might not always exist
    $table->string('cancel_req')->nullable(); // Optional, if cancel request might not always exist
    
    $table->timestamps(); // Created at and updated at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

