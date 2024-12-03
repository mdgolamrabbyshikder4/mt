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
        Schema::create('find_partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->integer('age');
            $table->string('profession');
            $table->string('marital_status');
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('description');
            $table->string('contact_number');
            $table->string('bio_data')->nullable(); // For PDF or image
            $table->tinyInteger('find_type')->default(0); // Default 0, set to 1 after marriage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('find_partners');
    }
};
