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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable(); // or any other type you need
            $table->string('catagory');
            $table->string('img');
            $table->string('first_price');
            $table->string('second_price');
            $table->string('third_price');
            $table->string('first_title');
            $table->string('second_title');
            $table->string('third_title');
            $table->string('user_id');
            $table->string('rank');
            $table->string('review');
            $table->string('tag');
            $table->string('requirdfile');
            $table->string('aproval');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
